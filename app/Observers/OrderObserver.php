<?php

namespace App\Observers;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\UserResource;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderNotification;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        try {
            $admins = User::role(['super_admin', 'commercial', 'directeur_commercial'])->get();
            foreach ($admins as $admin) {

                // Email notificationa
                $admin->notify(new OrderNotification($order));

                // Intercocina db notifications

                $admin->notify(
                    Notification::make()
                        ->title('🛒 Nouvelle Commande')
                        ->icon('heroicon-o-shopping-cart')
                        ->info()
                        ->body(new HtmlString('Nouvelle commande du client ' . '<strong><a href="' . UserResource::getUrl('view', ['record' => $order->user]) . '">' . $order->user->full_name . '</a></strong>'))
                        ->actions([
                            Action::make('Voir')
                                ->icon('heroicon-o-eye')
                                ->button()
                                ->url(OrderResource::getUrl('view', ['record' => $order]))
                                ->color('success')
                                ->markAsRead(),
                            Action::make('Lu')
                                ->icon('heroicon-o-check-circle')
                                ->button()
                                ->markAsRead(),
                        ])->toDatabase()
                );
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
