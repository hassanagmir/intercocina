<?php

namespace App\Filament\Resources\Families\Pages;

use App\Filament\Resources\Families\FamilyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListFamilies extends ListRecords
{
    protected static string $resource = FamilyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon(Heroicon::OutlinedPlusCircle),
        ];
    }
}
