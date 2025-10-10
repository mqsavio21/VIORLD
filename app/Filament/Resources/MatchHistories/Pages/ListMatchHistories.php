<?php

namespace App\Filament\Resources\MatchHistories\Pages;

use App\Filament\Resources\MatchHistories\MatchHistoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMatchHistories extends ListRecords
{
    protected static string $resource = MatchHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
