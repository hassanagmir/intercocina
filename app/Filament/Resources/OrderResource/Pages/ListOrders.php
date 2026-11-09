<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'ON_HOLD' => Tab::make()
                ->label(__("En Attente"))
                ->icon("heroicon-o-clock")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatusEnum::ON_HOLD)->latest()),
    
            'ALL' => Tab::make()
                ->label(__("Tout"))
                ->icon("heroicon-o-wallet")
                ->modifyQueryUsing(fn(Builder $query) => $query->latest()),
    
            'CONFIRMED' => Tab::make()
                ->label(__("Confirmé"))
                ->icon("heroicon-o-check-circle")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatusEnum::CONFIRMED)->latest()),
    
            'PREPARATION' => Tab::make()
                ->label(__("Préparation"))
                ->icon("heroicon-o-arrow-path")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatusEnum::PREPARATION)->latest()),
    
            'READY' => Tab::make()
                ->label(__("Prêt"))
                ->icon("heroicon-o-bell-alert")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatusEnum::READY)->latest()),
    
            'CANCELED' => Tab::make() // Fixed typo
                ->label(__("Annulé"))
                ->icon("heroicon-o-x-circle")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatusEnum::CANCELED)->latest()), // Fixed typo
        ];
    }
    
}
