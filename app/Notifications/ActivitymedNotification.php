<?php

namespace App\Notifications;

use App\Models\MedicalSample;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class ActivitymedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(MedicalSample  $medtransfer)
    {
        $this->medtransfer = $medtransfer;
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

    public function toArray(object $notifiable): array
    {
        return [
            'idActivity' => $this->medtransfer->idActivity,
            'muestra' => $this->medtransfer->product,
            'cantidad' => $this->medtransfer->cantidad,
            'medico' => $this->medtransfer->medico,
            'time' => Carbon::now()->diffForHumans()

        ];
    }
}
