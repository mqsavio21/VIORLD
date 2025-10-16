<?php

namespace App\Filament\Player\Widgets;

use App\Models\Schedule;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpcomingSchedulesWidget extends TableWidget
{
    protected static ?string $model = Schedule::class;

    public function table(Table $table): Table
    {
        return $table
            ->query(function (): Builder {
                $query = Schedule::query()
                    ->whereDate('date_start', '>=', now()->format('Y-m-d'))
                    ->whereTime('time_start', '>=', now()->format('H:i:s'))
                    ->orderBy('date_start')
                    ;

                return $query->where('team_id', Auth::user()->team_id);
            })
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('date_start')->date(),
                TextColumn::make('time_start'),
            ]);
    }
}
