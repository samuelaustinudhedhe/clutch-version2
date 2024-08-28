<?php

namespace App\View\Livewire\User\Onboarding;

use App\Notifications\Onboarding\Completed;
use App\Notifications\Onboarding\Skipped;
use App\Traits\WithSteps;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\Attachments\AttachmentUploadController as Upload;
use Illuminate\Support\Facades\Storage;

class Layout extends Component
{
    use WithSteps, WithFileUploads;

    public $user;
    public $profile_photo;


    /**
     * Initialize the component by setting the user property.
     * 
     * This method is called when the component is mounted. It retrieves the current user
     * and assigns it to the user property of the component.
     * 
     * @return void
     */
    public function mount()
    {
        $this->user = getUser();
    }

    public function updateProfile_Photo()
    {
        $fileName = $this->profile_photo->getClientOriginalName();
        $storedPath = $this->profile_photo->store('tmp', 'public');
        $mimeType = $this->profile_photo->getMimeType();

        // Delete the duplicate file uploaded by Livewire
        $this->deleteFile($this->profile_photo);

        // Store the document details in the documents array
        $data = [
            'name' => $fileName,
            'path' => $storedPath,
            'mime_type' => $mimeType,
        ];

        $this->putData(['profile_photo' => $data]);


    }
    /**
     * Deletes a file from either temporary or permanent storage.
     *
     * This function checks if the file is in temporary storage and deletes it if found.
     * If the file is not in temporary storage, it attempts to delete it from permanent storage.
     *
     * @param mixed $file The file to be deleted. This can be an object with a method `getRealPath` for temporary files,
     *                    or an object with a `path` property for files in permanent storage.
     * @return void
     */
    protected function deleteFile($file)
    {
        // Check if the file is in temporary storage
        if (method_exists($file, 'getRealPath')) {
            $filePath = $file->getRealPath();

            // Delete the file from the temporary storage
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        } else {
            // Handle permanent storage deletion if the file is already saved
            $filePath = $file->path; // Adjust based on how you store the file path
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
    }

    public function defineSteps()
    {
        $this->stepNames = [
            0 => 'Introduction',
            1 => 'Your Goal',
            2 => 'Personal Details',
            3 => 'Verification',
            4 => 'KYC',
            5 => 'Review and Submit'
        ];
        $this->totalSteps = count($this->stepNames) - 1;
    }

    public function defineStore()
    {
        $this->storeData = $this->load();
        $this->storePath = "Users/" . getUser()->id . "/data/onboarding.json";
    }
    /**
     * Check and update the current step based on the user's role.
     */
    public function checkSteps()
    {
        if ($this->user->role !== 'subscriber' && ($this->currentStep == 0 || $this->currentStep == 1)) {
            $this->currentStep = 2;
        }
    }

    protected function submit()
    {
        if ($this->storageData['profile_photo']) {
            $this->storeProfilePicture($this->user);
        }
    }

    protected function storeProfilePicture($user)
    {
        $folder = 'users/' . toSlug($user->name, '-') . '-' . $user->id . '/profile_photos';
        $filename = 'profile-picture.webp';

        $path = Upload::image($user, $this->storeData['profile_photo']->getRealPath(), $folder, $filename, 'resize', 200, 200);

        // Update user profile picture path
        $user->profile_photo_path = $path;
        $user->save();
    }
    /**
     * Complete the onboarding process.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the user dashboard with a completion message.
     */
    #[On('onboarding-completed')]
    public function completeOnboarding()
    {
        $this->user->forceFill([
            'boarding->status' => 'completed',
            'boarding->step' => $this->currentStep,
            'boarding->restart_at' => '',
            'boarding->completed_at' => now(),
        ])->save();

        $this->user->notify(new Completed());
        // Redirect to the user dashboard after completing the onboarding process
        return redirect()->route('user.dashboard')->with('message', 'You have completed the onboarding process. You have been updated to ' . ucfirst($this->role) . '.');
    }

    /**
     * Skip the onboarding process.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the user dashboard with a skip message.
     */
    #[On('onboarding-skip')]
    public function skipOnboarding()
    {
        // Check if the user's onboarding status is already 'skipped'
        if ($this->user->onboarding->status !== 'skipped') {
            // Update the user's onboarding status
            $this->user->forceFill([
                'boarding->status' => 'skipped',
                'boarding->step' => $this->currentStep,
                'boarding->restart_at' => now()->addDays(2),
                'boarding->completed_at' => '',
            ])->save();

            // Notify the user about the skipped onboarding process 
            $this->user->notify(new Skipped());
        }

        // Redirect to the user dashboard after skipping the onboarding process
        return redirect()->route('user.dashboard')->with('info', 'You have skipped the onboarding process.');
    }





    public function render()
    {
        return view(
            'user.onboarding.layout',
            [
                'prevStepName' => $this->getPrevStepName(),
                'nextStepName' => $this->getNextStepName(),
                'currentStepName' => $this->getStepName($this->currentStep),
                'currentStep' => $this->updateCurrentStep(),
                'nextPrefix' => 'next-',
                'prevPrefix' => 'prev-',
                'countries' => countries(),
            ]
        );
    }
}
