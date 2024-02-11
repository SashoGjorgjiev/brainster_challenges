<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ActivationEmail;
use App\Events\ActivationAcount;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;





class UserVerificationController extends Controller
{
    public function activate(Request $request, $email, $code)
    {
        $user = User::where('email', $email)->first();

        if (!$request->hasValidSignature()) {
            return view('mail.expired_verification_link', ['email' => $email]);
        }

        if ($user->activation_code !== $code) {
            abort(401, 'Unauthorized Access');
        }

        $user->update(['is_active' => true]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('activated', 'Your account has been activated');
    }

    public function generateActivationLink(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        $newActivationCode = Str::random(32);
        $user->update(['activation_code' => $newActivationCode, 'is_active' => false]);
        Log::info('Activation link generated.', ['user_id' => $user->id, 'email' => $user->email, 'activation_code' => $newActivationCode]);


        $activationUrl = URL::temporarySignedRoute('activate', now()->addMinutes(5), ['email' => $user->email, 'code' => $newActivationCode]);
        Event::dispatch(new ActivationAcount($user, $newActivationCode, $activationUrl));

        return view('mail.expired_verification_link', ['message' => 'A new activation link has been sent to your email.']);
    }
}
