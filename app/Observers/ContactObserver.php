<?php

namespace App\Observers;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactNotification;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ContactObserver
{
    /**
     * Handle the Contact "created" event.
     */
    public function created(Contact $contact): void
    {
        $admins = User::role(['super_admin', 'commercial', 'directeur_commercial'])->get();
        foreach($admins as $admin){
            $admin->notify(new ContactNotification($contact));

            $admin->notify(
                Notification::make()
                    ->title('📩 Nouvelle Message')
                    ->icon('heroicon-o-envelope')
                    ->info()
                    ->body(new HtmlString('Nouvelle Message du ' . '<strong><a href="' . ContactResource::getUrl('view', ['record' => $contact]) . '">' . $contact->full_name . '</a></strong>'))
                    ->actions([
                        Action::make('Voir')
                            ->icon('heroicon-o-eye')
                            ->button()
                            ->url(ContactResource::getUrl('view', ['record' => $contact]))
                            ->color('success')
                            ->markAsRead(),
                        Action::make('Lu')
                            ->icon('heroicon-o-check-circle')
                            ->button()
                            ->markAsRead(),
                    ])->toDatabase());

        }
    }

    /**
     * Handle the Contact "updated" event.
     */
    public function updated(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "deleted" event.
     */
    public function deleted(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "restored" event.
     */
    public function restored(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "force deleted" event.
     */
    public function forceDeleted(Contact $contact): void
    {
        //
    }
}
