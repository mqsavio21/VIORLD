<?php

namespace App\Filament\Resources\Notes\Schemas;

use Filament\Schemas\Schema;

class NoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')
                    ->required(),
                \Filament\Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                \Filament\Forms\Components\TextInput::make('video_link'),
                \Filament\Forms\Components\Select::make('player_id')
                    ->relationship('player', 'name')
                    ->required(),
                \Filament\Forms\Components\Select::make('coach_id')
                    ->relationship('coach', 'name')
                    ->required(),
                \Filament\Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'done' => 'Done',
                    ])
                    ->required(),
                \Filament\Forms\Components\Textarea::make('feedback')
                    ->columnSpanFull(),
            ]);
    }
}
