<?php

namespace App\Observers;

use App\Filament\Resources\ReclamationResource;
use App\Models\Reclamation;
use App\Models\User;
use App\Notifications\ClaimNotification;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;

class CliamObserver
{
    /**
     * Handle the Reclamation "created" event.
     */
    public function created(Reclamation $reclamation): void
    {
        $admins = User::role(['super_admin', 'commercial', 'directeur_commercial'])->get();
        foreach($admins as $admin){
            $admin->notify(new ClaimNotification($reclamation));
            $admin->notify(
                Notification::make()
                    ->title('⭕ Nouvelle Reclamation')
                    ->icon('heroicon-o-document')
                    ->info()
                    ->body(new HtmlString('Nouvelle Reclamation du client ' . '<strong><a href="' . ReclamationResource::getUrl('view', ['record' => $reclamation]) . '">' . $reclamation->full_name . '</a></strong>'))
                    ->actions([
                        Action::make('Voir')
                            ->icon('heroicon-o-eye')
                            ->button()
                            ->url(ReclamationResource::getUrl('view', ['record' => $reclamation]))
                            ->color('warning')
                            ->markAsRead(),
                        Action::make('Lu')
                            ->icon('heroicon-o-check-circle')
                            ->button()
                            ->markAsRead(),
                    ])->toDatabase());
        }
    }

    /**
     * Handle the Reclamation "updated" event.
     */
    public function updated(Reclamation $reclamation): void
    {
        //
    }

    /**
     * Handle the Reclamation "deleted" event.
     */
    public function deleted(Reclamation $reclamation): void
    {
        //
    }

    /**
     * Handle the Reclamation "restored" event.
     */
    public function restored(Reclamation $reclamation): void
    {
        //
    }

    /**
     * Handle the Reclamation "force deleted" event.
     */
    public function forceDeleted(Reclamation $reclamation): void
    {
        //
    }
}
