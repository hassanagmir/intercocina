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
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected static string $view = 'filament.view-order';


    public function notify($text){
        Notification::make()
            ->title($text)
            ->success()
            ->send();
    }


    public function getTitle(): Htmlable
    {
        return new HtmlString("<span class='text-xl'>{$this->getRecordTitle()}</span>");
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
            Actions\Action::make('export')
                ->color('info')
                ->label('Export')
                ->action(function(Order $record) : void{
                    $this->redirect(route('order.export-text', $record));
                })
                ->icon("heroicon-o-arrow-up-tray"),
        ];
    }
}
