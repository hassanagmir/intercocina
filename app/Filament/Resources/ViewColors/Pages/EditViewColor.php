<?php

namespace App\Filament\Resources\ViewColors\Pages;

use App\Filament\Resources\ViewColors\ViewColorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditViewColor extends EditRecord
{
    protected static string $resource = ViewColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
