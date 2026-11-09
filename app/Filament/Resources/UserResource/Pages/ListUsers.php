<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;



class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'ACTIVE' => Tab::make()
                ->label(__("Active"))
                ->icon("heroicon-o-clock")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 1)),
                
            'ALL' => Tab::make()
                ->label(__("Tout"))
                ->icon("heroicon-o-wallet"),

            'NEW' => Tab::make()
                ->label(__("Nouveau"))
                ->icon("heroicon-o-calendar")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('created_at', '>=', Carbon::now()->subDays(30))),

            'INACTIF' => Tab::make()
                ->label(__("Inactif"))
                ->icon("heroicon-o-check-circle")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 2)),

            'IGNORD' => Tab::make()
                ->label(__("Ignorée"))
                ->icon("heroicon-o-check-circle")
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 3)),
        ];
    }
}
