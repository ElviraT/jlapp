<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\ActivitymedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ActivitymedListener
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
            ->each(function (User $user) use ($event) {
                Notification::send($user, new ActivitymedNotification($event->medtransfer));
            });
    }
}
