<?php

namespace App\View\Livewire\Admin\Resources\Users;

use App\Http\Controllers\Attachments\AttachmentController;
use App\Http\Controllers\Uploads\UploadController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

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
            'password' => 'required|string|min:8|max:50',
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

        $this->reset(['name', 'email', 'password', 'selectedRole', 'send_welcome_email']);
    }
    private function storeProfilePicture(User $user)
    {
        $folder = 'users/' . toSlug($user->name, '-') . '-' . $user->id . '/profile_photos';
        $filename = 'profile-picture.webp';

        $path = UploadController::image($user, $this->profile_photo->getRealPath(), $folder, $filename);

        // Update user profile picture path
        $user->profile_photo_path = $path;
        $user->save();
    }

    public function render()
    {
        $roles = Role::search('guard', 'web')->get();
        return view('admin.resources.users.create', compact('roles'))->layout('layouts.admin');
    }
}
