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
        ini_set('memory_limit', '8192M');
        return [
            Actions\DeleteAction::make()
                ->color('danger')
                ->icon('heroicon-o-trash'),

            Actions\CreateAction::make()
                ->color('success')
                ->url('/admin/products/create')
                ->icon('heroicon-o-plus-circle'),
            Actions\Action::make('view')
                ->label(__("Voir"))
                ->color('info')
                ->url(route('product.show', $this->record->slug))
                ->openUrlInNewTab()
                ->icon('heroicon-o-rocket-launch'),
        ];
    }
}
