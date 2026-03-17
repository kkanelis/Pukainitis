<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'years',
        'animal_type',
        'activity_level',
        'social_level',
        'sleep_type',
        'life_style',
        'temperament',
        'adventure_level',
        'image_id',
    ];
}
