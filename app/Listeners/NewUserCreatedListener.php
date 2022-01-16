<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\ {
    Events\NewUserCreatedEvent,
    Notifications\NewUserCreated as SendNotificationNewUserCreated,
    User
};
use Illuminate\Support\Facades\Notification;

class NewUserCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param NewUserCreatedEvent $event
     * @return void
     */
    public function handle(NewUserCreatedEvent $event)
    {
        //
        Notification::send(User::where('type', 'admin')->first(), new SendNotificationNewUserCreated($event->user));
    }

}
