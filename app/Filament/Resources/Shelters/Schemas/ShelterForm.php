<?php

namespace App\Filament\Resources\Shelters\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class ShelterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->label("Nosaukums"),
                TextInput::make('phone_number')->label("Telefona nummurs"),
                TextInput::make('email')->required()->label("E-Pasts"),
                TextInput::make('location')->required()->label("Atrašanās vieta"),
            ]);
    }
}
