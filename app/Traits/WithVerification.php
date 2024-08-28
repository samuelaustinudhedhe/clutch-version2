<?php

namespace App\Traits;

trait WithVerification
{
    public $verificationCode;

    public function verify($user)
    {
        $verification = json_decode($user->verification, true);

        // Check if the code has expired
        if (now()->greaterThan($verification['email']['code_expires_at'])) {
            session()->flash('error', 'The verification code has expired.');
            return;
        }

        // Check if the user has exceeded the allowed attempts
        if ($verification['email']['attempts'] >= 3) {
            session()->flash('error', 'You have exceeded the maximum number of attempts. Please request a new verification code.');
            return;
        }

        // Check if the verification code is correct
        if ($verification['email']['code'] === $this->verificationCode) {
            $verification['account']['status'] = true;
            $verification['account']['verified_at'] = now();
            $verification['account']['verified_status'] = 'approved';
            $verification['email']['code'] = null;
            $verification['email']['code_expires_at'] = null;
            $verification['email']['attempts'] = 0; // Reset attempts after successful verification
        } else {
            // Increment the failed attempts counter
            $verification['email']['attempts']++;
            session()->flash('error', 'Invalid verification code. Please try again.');
        }

        // Save the updated verification data
        $user->verification = json_encode($verification);
        $user->save();

        if ($verification['account']['status']) {
            return redirect()->route('dashboard');
        }
    }

}
