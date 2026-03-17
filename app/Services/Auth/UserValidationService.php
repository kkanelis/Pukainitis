<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserValidationService
{
    public function validateStore(array $data): array
    {
        return Validator::make($data, [
            'first_name' => ['required','string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:8']
        ])->validate();
    }
}