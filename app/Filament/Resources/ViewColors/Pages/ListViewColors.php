<?php

namespace App\Filament\Resources\ViewColors\Pages;

use App\Filament\Resources\ViewColors\ViewColorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListViewColors extends ListRecords
{
    protected static string $resource = ViewColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
