<?php

namespace App\Filament\Player\Resources\Materials;

use App\Filament\Player\Resources\Materials\Pages\CreateMaterial;
use App\Filament\Player\Resources\Materials\Pages\EditMaterial;
use App\Filament\Player\Resources\Materials\Pages\ListMaterials;
use App\Filament\Player\Resources\Materials\Schemas\MaterialForm;
use App\Filament\Player\Resources\Materials\Tables\MaterialsTable;
use App\Models\Material;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return MaterialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MaterialsTable::configure($table);
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
            'index' => ListMaterials::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('creator', function (Builder $query) {
            $query->where('team_id', Auth::user()->team_id);
        });
    }
}
