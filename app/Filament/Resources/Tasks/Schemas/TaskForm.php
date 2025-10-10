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
        $user = Auth::user();
        $players = $user->role === 'coach'
            ? User::where('role', 'player')->where('team_id', $user->team_id)->pluck('name', 'id')
            : User::where('role', 'player')->pluck('name', 'id');

        $coaches = $user->role === 'coach'
            ? User::where('role', 'coach')->where('team_id', $user->team_id)->pluck('name', 'id')
            : User::whereIn('role', ['coach', 'admin'])->pluck('name', 'id');

        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->required(),
                Select::make('assigned_to')
                    ->label('Assign To')
                    ->options($players)
                    ->searchable()
                    ->required(),
                Select::make('assigned_by')
                    ->label('Assign By')
                    ->options($coaches)
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
