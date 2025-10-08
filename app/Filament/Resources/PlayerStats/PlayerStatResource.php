<?php

namespace App\Filament\Resources\PlayerStats;

use App\Filament\Resources\PlayerStats\Pages\CreatePlayerStat;
use App\Filament\Resources\PlayerStats\Pages\EditPlayerStat;
use App\Filament\Resources\PlayerStats\Pages\ListPlayerStats;
use App\Filament\Resources\PlayerStats\Schemas\PlayerStatForm;
use App\Filament\Resources\PlayerStats\Tables\PlayerStatsTable;
use App\Models\PlayerStat;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PlayerStatResource extends Resource
{
    protected static ?string $model = PlayerStat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

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

    public static function canCreate(): bool
    {
        return auth()->user()->hasAnyRole(['super_admin', 'coach']);
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->user()->hasAnyRole(['super_admin', 'coach']);
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->hasRole('player')) {
            return parent::getEloquentQuery()->where('player_id', auth()->id());
        }

        if (auth()->user()->hasRole('coach')) {
            $teamPlayerIds = User::where('team_id', auth()->user()->team_id)->pluck('id');
            return parent::getEloquentQuery()->whereIn('player_id', $teamPlayerIds);
        }

        return parent::getEloquentQuery();
    }
}
