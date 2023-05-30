<?php

namespace App\Notifications;

use App\Models\RegisterTransfer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class TransferNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
    */
    // public $transfer;
    public function __construct(RegisterTransfer  $transfer)
    {
        $this->transfer = $transfer;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'idProduct' => $this->transfer->idProduct,
            'idPharmacyT' => $this->transfer->idPharmacyT,
            'cantidad' => $this->transfer->cantidad,
            'time' => Carbon::now()->diffForHumans()
            
        ];
    }
}