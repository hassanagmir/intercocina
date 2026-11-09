<?php

namespace App\Filament\Resources\PanelColorResource\Pages;

use App\Filament\Resources\PanelColorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPanelColor extends EditRecord
{
    protected static string $resource = PanelColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
