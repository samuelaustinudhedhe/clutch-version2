<?php

namespace App\View\Livewire\User\Onboarding;

use App\Http\Controllers\Attachments\AttachmentUploadController as Upload;
use App\Models\Admin;
use App\Models\User;
use App\Traits\WithSteps;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PersonalDetails extends Main
{
    use WithSteps, WithFileUploads;

    public $photo = [];


    /**
     * The mount method is called when the Livewire component is initialized.
     * It sets the initial value of the 'photo' property based on the 'files' property.
     *
     * @return void
     */
    public function mount()
    {
        $this->user = getUser();
        $this->photo['file'] = $this->files['photo'] ?? null;
    }

    /**
     * Handle the upload and validation of the photo file.
     *
     * @return void
     */
    public function updatedPhoto()
    {
        // Validate the file
        $this->validate([
            'photo.new' => 'required|image|max:1024', // Adjust rules as needed
        ]);

        $path = $this->photo['path'] ?? null;
        $new = $this->photo['new'] ?? null;

        $this->photo['file'] = $this->uploadFile('photo', $new, $path);
        // Optionally reset file input
        // $this->reset('photo');
    }

    /**
     * Saves the user's profile photo to the storage, updates the user's profile photo path,
     * and attaches the photo with the user via attachable.
     *
     * @param User|Admin $user The user or admin object for which the photo is being saved.
     *
     * @return void
     */
    public function savePhoto(User|Admin $user)
    {
        if ($this->photo['file']['path']) {
            $image = Storage::path('public/' . $this->photo['file']['path']);
            $profilePath = getUserStorage() . 'profile/photo.webp';
            $photoName = $this->getDocName('photo');
            $photoDesc = $user->name . '\'s ' . $photoName;

            // Save the photo to the storage, update the user profile photo and attach it with the user Via attachable
            $user->profile_photo_path = Upload::file(
                name: $photoName,
                description: $photoDesc,
                file: $image,
                is_featured: false,
                quality: 90,
                authorable: $user,
                attachable: $user,
                path: $profilePath,
            );
            $user->save();

            // Delete the uploaded photo after saving it to the storage
            unset($this->storeData['files']['photo']);
            $this->deleteFile($image);
        }
    }

    /**
     * Renders the view for the personal details step in the onboarding process.
     *
     * @return \Illuminate\View\View The view for the personal details step.
     */
    public function render()
    {
        return view(
            'user.onboarding.personal-details',
            [
                'countries' => getSortedCountries(),
                'userCountryCode' => 'NG' // Fetch the user's country code
            ]
        );
    }
}
