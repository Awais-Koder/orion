<?php

namespace App\Filament\Resources\CountryApplicationResource\Pages;

use App\Filament\Resources\CountryApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCountryApplication extends EditRecord
{
    protected static string $resource = CountryApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
