<?php

namespace App\Filament\Resources\ViewColorResource\Pages;

use App\Filament\Resources\ViewColorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditViewColor extends EditRecord
{
    protected static string $resource = ViewColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
