<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Actions\ActionGroup;
use Filament\Notifications\Notification;
use Filament\Support\Enums\IconSize;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;


    public function notify($text){
        Notification::make()
            ->title($text)
            ->success()
            ->send();
    }


    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                Actions\Action::make("Confirmé")
                    ->action(function(Order $record) : void{
                        $record->status = OrderStatusEnum::CONFIRMED;
                        $record->save();
                        $this->notify("Commande confirmée");
                    })
                    ->requiresConfirmation()
                    ->color('info')
                    ->icon("heroicon-o-check-circle"),


                Actions\Action::make("Préparation")
                    ->action(function(Order $record) : void{
                        $record->status = OrderStatusEnum::PREPARATION;
                        $record->save();
                        $this->notify("Commande en préparation");
                    })
                    ->requiresConfirmation()
                    ->color('warning')
                    ->icon("heroicon-o-arrow-path"),

                Actions\Action::make("Prêt")
                    ->action(function(Order $record) : void{
                        $record->status = OrderStatusEnum::READY;
                        $record->save();
                        $this->notify("Commande prêt");

                    })
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon("heroicon-o-bell-alert"),

                Actions\Action::make("Annulé")
                    ->action(function(Order $record) : void{
                        $record->status = OrderStatusEnum::CANCELD;
                        $record->save();
                        $this->notify("Commande annulé");
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon("heroicon-o-x-circle"),

            ])->icon("heroicon-o-squares-2x2")
                ->iconSize(IconSize::Large)
                ->tooltip(__("État")),
            Actions\EditAction::make()
                ->color('info')
                ->icon("heroicon-o-pencil-square"),
        ];
    }
}
