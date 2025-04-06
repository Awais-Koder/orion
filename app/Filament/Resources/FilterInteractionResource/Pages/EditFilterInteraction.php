<?php

namespace App\Filament\Resources\FilterInteractionResource\Pages;

use App\Filament\Resources\FilterInteractionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFilterInteraction extends EditRecord
{
    protected static string $resource = FilterInteractionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
