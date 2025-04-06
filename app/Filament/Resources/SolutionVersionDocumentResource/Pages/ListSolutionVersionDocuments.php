<?php

namespace App\Filament\Resources\SolutionVersionDocumentResource\Pages;

use App\Filament\Resources\SolutionVersionDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSolutionVersionDocuments extends ListRecords
{
    protected static string $resource = SolutionVersionDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
