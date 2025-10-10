<?php

namespace App\Filament\Resources\MatchHistories\Pages;

use App\Filament\Resources\MatchHistories\MatchHistoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMatchHistory extends EditRecord
{
    protected static string $resource = MatchHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
