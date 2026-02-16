<?php

namespace App\Filament\Resources\ViewImages\Pages;

use App\Filament\Resources\ViewImages\ViewImageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditViewImage extends EditRecord
{
    protected static string $resource = ViewImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
