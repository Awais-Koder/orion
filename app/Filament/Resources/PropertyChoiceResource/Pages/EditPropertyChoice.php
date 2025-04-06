<?php

namespace App\Filament\Resources\PropertyChoiceResource\Pages;

use App\Filament\Resources\PropertyChoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPropertyChoice extends EditRecord
{
    protected static string $resource = PropertyChoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
