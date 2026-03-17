<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AnimalLikeService
{
    public function validateLikeStore(array $data): array
    {
        return Validator::make($data, [
            'animal_id' => ['required', 'exists:animals,id']
        ])->validate(); 
    }
}