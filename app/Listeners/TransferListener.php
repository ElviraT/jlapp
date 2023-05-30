<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\TransferNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class TransferListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        User::where('role', 'Admin')
                    ->each(function(User $user) use ($event){
                        Notification::send($user, new TransferNotification($event->transfer));
                    });
    }
}