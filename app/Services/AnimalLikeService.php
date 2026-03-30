<?php

namespace App\Services;

use Validator;
use ValidationException;

class AnimalLikeService
{
    public function validateLikeStore($data)
    {
        $val = Validator::make($data, [
            'animal_id' => ['required', 'exists:animals,id']
        ]);
        
        return $val->validate();
    }
}