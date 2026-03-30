<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'years',
        'animal_type',
        'activity_level',
        'social_level',
        'sleep_type',
        'life_style',
        'temperament',
        'adventure_level',
        'image_id',
        'shelter_id',
    ];

    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }
}
