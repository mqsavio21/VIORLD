<?php

namespace App\Filament\Player\Resources\PlayerStats\Pages;

use App\Filament\Player\Resources\PlayerStats\PlayerStatResource;
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
