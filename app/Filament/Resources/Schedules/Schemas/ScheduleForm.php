<?php

namespace App\Filament\Resources\Schedules\Schemas;

use App\Models\Team;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class ScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = Auth::user();
        $teams = $user->role === 'coach'
            ? Team::where('coach_id', $user->id)->pluck('name', 'id')
            : Team::all()->pluck('name', 'id');

        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Select::make('team_id')
                    ->label('Team')
                    ->options($teams)
                    ->searchable()
                    ->required(),
                Select::make('coach_id')
                    ->label('Coach')
                    ->options(function ($get) {
                        $teamId = $get('team_id');
                        if ($teamId) {
                            return User::where('role', 'coach')->where('team_id', $teamId)->pluck('name', 'id');
                        }
                        return User::where('role', 'coach')->pluck('name', 'id');
                    })
                    ->searchable()
                    ->required(),
                DatePicker::make('date_start')
                    ->label('Date')
                    ->required(),
                TimePicker::make('time_start')
                    ->label('Time')
                    ->required()
                    ->withoutSeconds(),
                Textarea::make('description')
                    ->required(),
            ]);
    }
}
