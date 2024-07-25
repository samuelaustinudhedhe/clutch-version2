<?php

namespace App\View\Livewire\Admin\Resources\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Attachments\AttachmentUploadController as Upload;
use Illuminate\Support\Facades\File;

class Create extends Component
{
    use WithFileUploads;

    public $firstName;
    public $lastName;
    public $email;
    public $email_status;
    public $password;
    public $password_confirmation;
    public $country_code;
    public $phone;
    public $status;
    public $date_of_birth;
    //address fields
    public $house;
    public $street;
    public $city;
    public $state;
    public $zip_code;
    public $country;
    //address fields end
    public $gender;
    public $role;
    public $send_welcome_email = false;
    public $profile_photo;
    public $countries;
    //social media fields
    public $facebook;
    public $twitter;
    public $instagram;
    public $linkedin;
    //social media fields end

    protected $rules = [
        'firstName' => 'required|string|min:2|max:30',
        'lastName' => 'required|string|min:2|max:55',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|max:50|confirmed',
        'status' => 'required|string|min:2|max:20',
        'country_code' => 'required|string|min:1|max:5',
        'phone' => 'required|string|min:5|max:20',
        'role' => 'required|exists:roles,slug',
        'profile_photo' => 'nullable|image|max:5120', // 5MB Max
        'street' => 'required|string|min:2|max:255',
        'house' => 'nullable|string|min:1|max:255',
        'city' => 'required|string|min:2|max:100',
        'state' => 'required|string|min:2|max:100',
        'zip_code' => 'nullable|string|min:2|max:20',
        'country' => 'required|string|min:2|max:100',
        'gender' => 'required|string|min:1|max:10',
        'date_of_birth' => 'required|date',
        'facebook' => 'nullable|string|url|max:255',
        'instagram' => 'nullable|string|url|max:255',
        'twitter' => 'nullable|string|url|max:255',
        'linkedin' => 'nullable|string|url|max:255',
    ];

    public function mount()
    {
        $this->countries = countries();
    }

    public function createUser()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->firstName . ' ' . $this->lastName,
            'email' => $this->email,
            'email_verified_at' => $this->email_status === 'verified' ? now() : null,
            'phone' => json_encode([
                'country_code' => $this->country_code,
                'phone' => $this->phone,
                'added_at' => now(),
            ]),
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'status' => $this->status,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'address' => json_encode([
                'house' => $this->house,
                'street' => $this->street,
                'city' => $this->city,
                'state' => $this->state,
                'zip_code' => $this->zip_code,
                'country' => $this->country,
            ]),
            'social' => json_encode([
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
            ]),
        ]);

        if ($this->profile_photo) {
            $this->storeProfilePicture($user);
        }

        if ($this->send_welcome_email) {
            Mail::to($user->email)->send(new WelcomeMail($user, $this->password));
        }

        session()->flash('message', 'User created successfully.');

        $this->reset(array_merge(array_keys($this->rules), ['password_confirmation']));
    }
    private function storeProfilePicture(User $user)
    {
        $folder = 'users/' . toSlug($user->name, '-') . '-' . $user->id . '/profile_photos';
        $filename = 'profile-picture.webp';

        $path = Upload::image($user, $this->profile_photo->getRealPath(), $folder, $filename, 'resize', 200, 200);

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
