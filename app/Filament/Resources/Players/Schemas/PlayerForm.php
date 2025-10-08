<?php

namespace App\Filament\Resources\Players\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class PlayerForm
{
    public static function schema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            Select::make('rank')
                ->options([
                    'Iron' => 'Iron',
                    'Bronze' => 'Bronze',
                    'Silver' => 'Silver',
                    'Gold' => 'Gold',
                    'Platinum' => 'Platinum',
                    'Diamond' => 'Diamond',
                    'Ascendant' => 'Ascendant',
                    'Immortal' => 'Immortal',
                    'Radiant' => 'Radiant',
                ])
                ->required(),
            Select::make('main_role')
                ->options([
                    'Duelist' => 'Duelist',
                    'Controller' => 'Controller',
                    'Initiator' => 'Initiator',
                    'Sentinel' => 'Sentinel',
                ])
                ->required(),
            Textarea::make('notes')
                ->maxLength(65535),
            Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
        ];
    }
}
