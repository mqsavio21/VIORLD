<?php

namespace App\Filament\Resources\PlayerStats\Pages;

use App\Filament\Resources\PlayerStats\PlayerStatResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPlayerStat extends EditRecord
{
    protected static string $resource = PlayerStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
