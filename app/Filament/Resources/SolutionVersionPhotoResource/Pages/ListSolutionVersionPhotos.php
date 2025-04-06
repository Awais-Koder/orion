<?php

namespace App\Filament\Resources\SolutionVersionPhotoResource\Pages;

use App\Filament\Resources\SolutionVersionPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSolutionVersionPhotos extends ListRecords
{
    protected static string $resource = SolutionVersionPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
