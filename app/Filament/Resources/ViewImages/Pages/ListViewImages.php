<?php

namespace App\Filament\Resources\ViewImages\Pages;

use App\Filament\Resources\ViewImages\ViewImageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListViewImages extends ListRecords
{
    protected static string $resource = ViewImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
