<?php

namespace App\Filament\Resources\SolutionVersionPhotoResource\Pages;

use App\Filament\Resources\SolutionVersionPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSolutionVersionPhoto extends EditRecord
{
    protected static string $resource = SolutionVersionPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
