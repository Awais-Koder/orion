<?php

namespace App\Filament\Resources\EtaReportResource\Pages;

use App\Filament\Resources\EtaReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEtaReport extends EditRecord
{
    protected static string $resource = EtaReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
