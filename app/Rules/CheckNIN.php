<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class CheckNIN implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $ninExists = DB::table('users')
            ->whereJsonContains('details->nin', $value)
            ->exists();

        if ($ninExists) {
            $fail('The NIN is assigned to an account.');
        }
    }
}
