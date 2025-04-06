<?php

namespace App\Filament\Resources\FilterInteractionResource\Pages;

use App\Filament\Resources\FilterInteractionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFilterInteractions extends ListRecords
{
    protected static string $resource = FilterInteractionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
