<?php

namespace App\Filament\Resources\ViewColors\Pages;

use App\Filament\Resources\ViewColors\ViewColorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewViewColor extends ViewRecord
{
    protected static string $resource = ViewColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
