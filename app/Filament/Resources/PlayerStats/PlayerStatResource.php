<?php

namespace App\Filament\Resources\PlayerStats;

use App\Filament\Resources\PlayerStats\Pages\CreatePlayerStat;
use App\Filament\Resources\PlayerStats\Pages\EditPlayerStat;
use App\Filament\Resources\PlayerStats\Pages\ListPlayerStats;
use App\Filament\Resources\PlayerStats\Schemas\PlayerStatForm;
use App\Filament\Resources\PlayerStats\Tables\PlayerStatsTable;
use App\Models\PlayerStat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PlayerStatResource extends Resource
{
    protected static ?string $model = PlayerStat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'month';

    public static function form(Schema $schema): Schema
    {
        return PlayerStatForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlayerStatsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPlayerStats::route('/'),
            'create' => CreatePlayerStat::route('/create'),
            'edit' => EditPlayerStat::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (Auth::user()->role === 'coach') {
            $query->whereHas('player', function (Builder $query) {
                $query->where('team_id', Auth::user()->team_id);
            });
        }

        return $query;
    }
}
