<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserValidationPrefrencesService
{
    public function validatePrefrencesStore(array $data): array
    {
        return Validator::make($data, [
            'activity_level' => ['string', 'min:3', 'max:20'],
            'social_level' => ['string', 'min:3', 'max:20'],
            'sleep_type' => ['string', 'min:3', 'max:20'],
            'life_style' => ['string', 'min:3', 'max:20'],
            'temperament' => ['string', 'min:3', 'max:20'],
            'adventure_level' => ['string', 'min:3', 'max:20'],
            'animal_type' => ['string', 'min:3', 'max:20'],
        ])->validate();
    }
}