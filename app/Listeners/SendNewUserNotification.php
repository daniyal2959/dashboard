<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\UserCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewUserNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $admins = User::role('administrator')->get();
        Notification::send($admins, new UserCreatedNotification($event->user));
    }
}
