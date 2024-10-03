<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Nette\Utils\Html;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;


    public function getTitle(): string|Htmlable
    {
        return new HtmlString("<span class='text-xl'>{$this->getRecordTitle()} </span>");
    }

    protected function getHeaderActions(): array
    {
        ini_set('max_execution_time', '300');
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
