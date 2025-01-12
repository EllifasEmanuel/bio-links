<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckHandler implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match('/^@[a-zA-Z0-9_-]+$/', $value) !== 1) {
            $fail('O campo :attribute deve conter apenas letras, números e sublinhados.');
        }
    }
}
