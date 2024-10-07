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
            'details' => $this->castDetails(),
            'verification' => $this->verificationData(),
            'records' => $this->activityLog(),
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user, 'cant send password'));

        return $user;
    }

    /**
     * Initialize the default user details.
     *
     * This function sets up the default structure for user details, including
     * phone numbers, date of birth, gender, address, and social information.
     *
     * @return array An associative array containing the default user details.
     *               - 'phone': An array with 'work' and 'home' phone details, each containing
     *                 'country_code', 'number', and 'verified_at'.
     *               - 'date_of_birth': The user's date of birth, initially set to null.
     *               - 'gender': The user's gender, defaulting to 'Rather not say'.
     *               - 'address': The user's address, initially set to null.
     *               - 'social': The user's social information, initially set to null.
     */
    protected function castDetails(): array
    {
        return [
            'phone' => [
                'work' => ['country_code' => '', 'number' => '', 'verified_at' => null],
                'home' => ['country_code' => '', 'number' => '', 'verified_at' => null]
            ],
            'status' => 'Onboarding', // pending, approved, rejected
            'date_of_birth' => null,
            'gender' => 'Rather not say',
            'address' => null,
            'social' => null,
        ];
    }

    /**
     * Generate the initial verification data for a new user.
     *
     * This function initializes the verification data with default values for various
     * user verification statuses such as account, owner, driver, email, and phone.
     *
     * @return array An associative array containing the default verification data.
     *               - 'account': Information about the account verification status and timestamp.
     *               - 'owner': Information about the owner verification status and timestamp.
     *               - 'driver': Information about the driver verification status and timestamp.
     *               - 'email': Information about the email verification code, sent time, expiry, and attempts.
     *               - 'phone': Information about the phone verification code, sent time, and attempts for home and work.
     */
    protected function verificationData(): array
    {

        return [
            'account' => [
                'status' => 'pending', // pending, approved, rejected
                'verified_at' => null,
            ],
            'owner' => [
                'status' => 'pending', // pending, approved, rejected
                'verified_at' => null,
            ],
            'driver' => [
                'status' => 'pending', // pending, approved, rejected
                'verified_at' => null,
            ],
            'email' => [
                'code' => null,
                'code_sent_at' => null,
                'code_expires_at' => null,
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

    /**
     * Generate the initial activity log data for a new user.
     *
     * This function initializes the activity log with default values for various
     * user activities such as password changes, email changes, phone changes, and
     * onboarding status.
     *
     * @return array An associative array containing the default activity log data.
     *               - 'password': Information about password reset and change history.
     *               - 'email': Information about email change history.
     *               - 'phone': Information about phone number change history for home and work.
     *               - 'onboarding': Information about the user's onboarding process status.
     */
    protected function activityLog(): array
    {
        return [
            'password' => [
                'resets_count' => 0,
                'changed_at' => null,
                'changed_count' => 0,
            ],
            'email' => [
                'changed_at' => null,
                'changed_from' => null,
                'changed_count' => 0,
            ],
            'phone' => [
                'home' => [
                    'changed_at' => null,
                    'changed_from' => null,
                    'changed_count' => 0,
                ],
                'work' => [
                    'changed_at' => null,
                    'changed_from' => null,
                    'changed_count' => 0,
                ],
            ],
            'onboarding' => [
                'status' => 'start', // start, completed, skipped
                'step' => 0,
                'restart_at' => '',
                'completed_at' => '',
            ],
        ];
    }
}
