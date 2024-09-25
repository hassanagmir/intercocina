<?php

namespace App\Notifications;

use App\Models\Reclamation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClaimNotification extends Notification
{
    use Queueable;

    public $claim;

    /**
     * Create a new notification instance.
     */
    public function __construct(Reclamation $reclamation)
    {
        $this->claim = $reclamation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('⭕ Nouvelle Réclamation')
            ->view('emails.claim-notification', [
                'contact_id' => $this->claim->id,
                'customer' => $this->claim->full_name,
                'phone' => $this->claim->phone,
                'customer_number' => $this->claim->client_number,
                'subject' => $this->claim->subject,
                'claim_message' => $this->claim->message,
                'date' => $this->claim->created_at->format('d F Y'),
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
