<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle'),
        ];
    }

    public function getTabs(): array
    {
        return [ // self::COMING => "Préparation",
            'ALL' => Tab::make()
                ->label(__("Tout"))
                ->icon("heroicon-o-wallet"),

            'IN' => Tab::make()
                ->label(__("En stock"))
                ->icon("heroicon-o-check-circle")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', ProductStatusEnum::IN)),

            'HIDE' => Tab::make()
                ->label(__("Cacher"))
                ->icon("heroicon-o-x-circle")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', ProductStatusEnum::HIDE)),


            'OUT' => Tab::make()
                ->label(__("En rupture"))
                ->icon("heroicon-o-bell-alert")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', ProductStatusEnum::OUT)),


            'COMING' => Tab::make()
                ->label(__("À venir"))
                ->icon("heroicon-o-clock")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', ProductStatusEnum::COMING)),
        ];
    }
}
