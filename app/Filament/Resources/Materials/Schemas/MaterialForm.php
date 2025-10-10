<?php

namespace App\Filament\Resources\Materials\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class MaterialForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = Auth::user();
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
                Select::make('category')
                    ->options([
                        'strat' => 'Strat',
                        'aim' => 'Aim',
                        'comms' => 'Comms',
                        'other' => 'Other',
                    ])
                    ->required(),
                TextInput::make('link')
                    ->required()
                    ->url()
                    ->maxLength(255),
                Select::make('created_by')
                    ->label('Author')
                    ->options($coaches)
                    ->default(Auth::id())
                    ->required(),
            ]);
    }
}
