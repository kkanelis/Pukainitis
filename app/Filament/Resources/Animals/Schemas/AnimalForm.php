<?php

namespace App\Filament\Resources\Animals\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use App\Models\Shelter;

class AnimalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('shelter_id')->options(Shelter::all()->pluck('name', 'id'))->label("Patversme"),
                TextInput::make('name')->required()->label("Vārds"),
                TextInput::make('years')->numeric()->label("Gadi"),
                Select::make('animal_type')->options([
                    'cat' => 'Kaķis',
                    'dog' => 'Suns',
                    'other' => 'Cits',
                ])->required()->label("Dzīvnieka tips"),
                Select::make('activity_level')->options([
                    'low' => 'Mazkustīgs',
                    'medium' => 'Vidēji aktīvs',
                    'high' => 'Ļoti aktīvs',
                ])->label("Aktivitātes līmenis"),
                Select::make('social_level')->options([
                    'low' => 'Intraverts',
                    'medium' => 'Ambiverts',
                    'high' => 'Ekstraverts',
                ])->label("Sociālais līmenis"),
                Select::make('sleep_type')->options([
                    'early' => 'Agrais putns',
                    'late' => 'Nakts pūce',
                    'mixed' => 'Jaukts',
                ])->label("Celšanās tips"),
                Select::make('life_style')->options([
                    'low' => 'Mierīgs',
                    'medium' => 'Aktīvs',
                    'high' => 'Haotisks',
                ])->label("Dzīves stils"),
                Select::make('temperament')->options([
                    'calm' => 'Mierīgs',
                    'playful' => 'Rotaļīgs',
                    'dominanting' => 'Dominējošs',
                ])->label("Temperaments"),
                Select::make('adventure_level')->options([
                    'low' => 'Mājās sēdētājs',
                    'medium' => 'Jaukts',
                    'high' => 'Pētnieks',
                ])->label("Piedzīvojumu līmenis"),
                FileUpload::make('image_id')
                    ->disk('public')
                    ->directory('animals')
                    ->label("Bilde"),
            ]);
    }
}
