<?php

namespace App\Filament\Resources\PropertyValueResource\Pages;

use App\Filament\Resources\PropertyValueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPropertyValue extends EditRecord
{
    protected static string $resource = PropertyValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
