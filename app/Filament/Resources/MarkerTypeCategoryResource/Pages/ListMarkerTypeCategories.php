<?php

namespace App\Filament\Resources\MarkerTypeCategoryResource\Pages;

use App\Filament\Resources\MarkerTypeCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMarkerTypeCategories extends ListRecords
{
    protected static string $resource = MarkerTypeCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
