<?php

namespace App\Filament\Resources\PanelColorResource\Pages;

use App\Filament\Resources\PanelColorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPanelColors extends ListRecords
{
    protected static string $resource = PanelColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
