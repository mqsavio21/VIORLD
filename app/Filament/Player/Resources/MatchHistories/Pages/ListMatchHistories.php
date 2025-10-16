<?php

namespace App\Filament\Player\Resources\MatchHistories\Pages;

use App\Filament\Player\Resources\MatchHistories\MatchHistoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMatchHistories extends ListRecords
{
    protected static string $resource = MatchHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
