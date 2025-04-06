<?php

namespace App\Filament\Resources\MarkerTypeCategoryResource\Pages;

use App\Filament\Resources\MarkerTypeCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMarkerTypeCategory extends EditRecord
{
    protected static string $resource = MarkerTypeCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
