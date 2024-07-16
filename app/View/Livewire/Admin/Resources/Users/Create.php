<?php

namespace App\View\Livewire\Admin\Resources\Users;

use App\Http\Controllers\Uploads\UploadController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\Attachment;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $selectedRole;
    public $send_welcome_email = false;
    public $profile_photo;

    public function mount()
    {
    }

    public function createUser()
    {
        $this->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:50|confirmed',
            'selectedRole' => 'required|exists:roles,slug',
            'profile_photo' => 'nullable|image|max:1024', // 1MB Max
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->selectedRole,  // Assuming there's only one role selected at
        ]);

        if ($this->profile_photo) {
            $this->storeProfilePicture($user);
        }

        if ($this->send_welcome_email) {
            Mail::to($user->email)->send(new WelcomeMail($user, $this->password));
        }

        session()->flash('message', 'User created successfully.');

        $this->reset(['name', 'email', 'password', 'password_confirmation', 'selectedRole', 'send_welcome_email']);
    }
    private function storeProfilePicture(User $user)
    {
        $folder = 'users/' . toSlug($user->name, '-') . '-' . $user->id . '/profile_photos';
        $filename = toSlug($user->name, '-').'\'s-' . 'profile-photo.jpg';
        $path = "$folder/$filename";

        $uploadedImage = (new UploadController)->image($this->profile_photo->getRealPath(), $folder, $filename,new WebpEncoder(65));
        
        Attachment::create([
            'name' => $filename,
            'file_path' => $path,
            'status' => 'active',
            'authorable_id' => $user->id,
            'authorable_type' => 'User',
            'size' => $this->profile_photo->getSize(),
            'extension' => $this->profile_photo->getClientOriginalExtension(),
            'mime_type' => $this->profile_photo->getMimeType(),
            //finishe this code
        ]);

        // Update user profile picture path
        $user->profile_photo_path = $uploadedImage;
        $user->save();
    }

    public function render()
    {
        $roles = Role::search('guard', 'web')->get();
        return view('admin.resources.users.create', compact('roles'))->layout('layouts.admin');
    }
}
