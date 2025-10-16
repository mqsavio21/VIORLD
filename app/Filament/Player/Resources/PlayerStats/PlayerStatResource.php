<?php

namespace App\Filament\Player\Resources\PlayerStats;

use App\Filament\Player\Resources\PlayerStats\Pages\CreatePlayerStat;
use App\Filament\Player\Resources\PlayerStats\Pages\EditPlayerStat;
use App\Filament\Player\Resources\PlayerStats\Pages\ListPlayerStats;
use App\Filament\Player\Resources\PlayerStats\Schemas\PlayerStatForm;
use App\Filament\Player\Resources\PlayerStats\Tables\PlayerStatsTable;
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
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('player_id', Auth::id());
    }
}
