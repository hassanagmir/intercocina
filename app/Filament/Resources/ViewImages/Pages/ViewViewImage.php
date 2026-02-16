<?php

namespace App\Filament\Resources\ViewImages\Pages;

use App\Filament\Resources\ViewImages\ViewImageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewViewImage extends ViewRecord
{
    protected static string $resource = ViewImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
