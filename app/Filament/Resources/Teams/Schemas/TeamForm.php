<?php

namespace App\Filament\Resources\Teams\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('coach_id')
                    ->label('Coach')
                    ->options(User::where('role', 'coach')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Textarea::make('description')
                    ->maxLength(65535),
            ]);
    }
}
