<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    protected function passwordRules(): array
    {
        // return ['required', 'string', Password::default(), 'confirmed'];
        return [
            'required',
            'string',
            Password::min(8) // Set minimum length
                // ->mixedCase() // Require at least one uppercase and one lowercase letter
                // ->numbers()   // Require at least one number
                // ->symbols(),  // Require at least one special character
        ];    }
}
