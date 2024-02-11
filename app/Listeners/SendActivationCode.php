<?php

namespace App\Listeners;

use App\Mail\ActivationEmail;
use App\Events\ActivationAcount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendActivationCode
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
        $activationUrl = $event->activationUrl;

        try {
            Mail::to($event->user)->send(new ActivationEmail($event->user, $activationUrl));

            Log::info('Activation email sent successfully.', [
                'user_id' => $event->user->id,
                'email' => $event->user->email,
                'activation_code' => $event->activationCode,
            ]);
        } catch (\Exception $e) {
            Log::error('Error sending activation email.', [
                'user_id' => $event->user->id,
                'email' => $event->user->email,
                'activation_code' => $event->activationCode,
                'exception_message' => $e->getMessage(),
            ]);
        }
    }
}
