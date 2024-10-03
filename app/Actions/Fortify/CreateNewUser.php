<?php

namespace App\Actions\Fortify;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->forceFill([
            'verification' => json_encode($this->verificationData()),
        ])->save();
  

        Mail::to($user->email)->send(new WelcomeMail($user, 'cant send password'));

        return $user;
    }

    /**
     * Generate the initial verification data for a new user.
     *
     * @return array An associative array containing the initial verification data for account, email, and phone.
     */
    public function verificationData(): array
    {
        return [
            
            'status' => 'pending',
            'verified_at' => null,
            'email' => [
                'code' => rand(100000, 999999),
                'code_sent_at' => now(),
                'code_expires_at' => now()->addHours(24),
                'attempts' => 0,
            ],
            'phone' => [
                'home' => [
                    'code' => null,
                    'code_sent_at' => null,
                    'attempts' => 0,
                ],
                'work' => [
                    'code' => null,
                    'code_sent_at' => null,
                    'attempts' => 0,
                ],
            ],
        ];
    }
}
