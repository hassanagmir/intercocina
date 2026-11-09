<?php

namespace App\Filament\Resources\ViewColorResource\Pages;

use App\Filament\Resources\ViewColorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListViewColors extends ListRecords
{
    protected static string $resource = ViewColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
