<?php

namespace App\Filament\Resources\EtaReportResource\Pages;

use App\Filament\Resources\EtaReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEtaReports extends ListRecords
{
    protected static string $resource = EtaReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
