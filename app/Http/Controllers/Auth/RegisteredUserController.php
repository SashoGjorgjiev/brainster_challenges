<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Events\ActivationAcount;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if (isset($validator)) {
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        if ($user) {
            $activationUrl = URL::temporarySignedRoute(
                'activation',
                now()->addMinutes(1),
                ['email' => $user->email, 'code' => $user->activation_code]
            );
            Event::dispatch(new ActivationAcount($user, $activationUrl, $user->activation_code));

            return response()->json(['message' => 'Account created successfully'], 201);
        }

        return response()->json(['message' => 'Something went wrong'], 400);
    }
}
