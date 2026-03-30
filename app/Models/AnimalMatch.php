<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimalMatch extends Model
{
    protected $table = 'animal_match';

    protected $fillable = [
        'user_id',
        'animal_id',
    ];

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}
