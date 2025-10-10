<?php

namespace App\Filament\Resources\MatchHistories;

use App\Filament\Resources\MatchHistories\Pages\CreateMatchHistory;
use App\Filament\Resources\MatchHistories\Pages\EditMatchHistory;
use App\Filament\Resources\MatchHistories\Pages\ListMatchHistories;
use App\Filament\Resources\MatchHistories\Schemas\MatchHistoryForm;
use App\Filament\Resources\MatchHistories\Tables\MatchHistoriesTable;
use App\Models\MatchHistory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MatchHistoryResource extends Resource
{
    protected static ?string $model = MatchHistory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'matchhistory';

    public static function form(Schema $schema): Schema
    {
        return MatchHistoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MatchHistoriesTable::configure($table);
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
            'index' => ListMatchHistories::route('/'),
            'create' => CreateMatchHistory::route('/create'),
            'edit' => EditMatchHistory::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (Auth::user()->role === 'coach') {
            $query->where('team_id', Auth::user()->team_id);
        }

        return $query;
    }
}
