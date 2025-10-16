<?php

namespace App\Filament\Player\Resources\PlayerStats\Pages;

use App\Filament\Player\Resources\PlayerStats\PlayerStatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPlayerStats extends ListRecords
{
    protected static string $resource = PlayerStatResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
