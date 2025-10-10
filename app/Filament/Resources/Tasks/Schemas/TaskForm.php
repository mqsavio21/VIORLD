<?php

namespace App\Filament\Resources\Tasks\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->required(),
                Select::make('assigned_to')
                    ->label('Assign To')
                    ->options(User::where('role', 'player')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('assigned_by')
                    ->label('Assign By')
                    ->options(User::whereIn('role', ['coach', 'admin'])->pluck('name', 'id'))
                    ->default(Auth::id())
                    ->required(),
                DatePicker::make('due_date')
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'done' => 'Done',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
