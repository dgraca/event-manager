<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Notifications\MagicAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class MagicAuthController extends Controller
{
    public function store() {
        // Validate the request
        $attributes = request()->validate(['email' => ['required', 'string', 'email', 'max:255']]);

        // Find the user by email
        $user = User::where('email', $attributes['email'])->first();


        // If user doesn't exist, registers and send email
        if (!$user) {
            // create a new user
            $user = User::create($attributes);

            // Assign the default role to the user
            $user->assignRole(Role::ROLE_USER);
            $user->markEmailAsVerified();
            $user->save();
        }

        // Send the magic link if the user exists
        if ($user) {
            // Create a temporary signed route
            $link = URL::temporarySignedRoute(
                'auth.magic',
                now()->addMinutes(30),
                ['user' => $user->id]
            );

            // Send the email to the user
            $user->notify(new MagicAuth($link));
        }

        return back()->with('status', __('We have emailed your magic link!'));
    }

    public function auth(User $user) {
        Auth::login($user);

        // Regenerate the session to prevent session fixation
        request()->session()->regenerate();

        return redirect()->intended(config('fortify.home'));
    }
}
