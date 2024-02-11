<?php

namespace App\Listeners;

use App\Events\ActivationAcount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActivateUser
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
    public function handle(ActivationAcount $event): void
    {
        $event->user->update(['is_active' => true]);
    }
}
