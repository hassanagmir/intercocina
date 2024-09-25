<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function getTitle(): string|Htmlable
    {
        return new HtmlString("<span class='text-xl'>{$this->getRecordTitle()} </span>");
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->color('danger')
                ->icon('heroicon-o-trash'),
            Actions\CreateAction::make()
                ->color('success')
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
