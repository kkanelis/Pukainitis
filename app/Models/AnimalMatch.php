<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalMatch extends Model
{
    protected $table = 'animal_match';

    protected $fillable = [
        'user_id',
        'animal_id',
    ];
}
