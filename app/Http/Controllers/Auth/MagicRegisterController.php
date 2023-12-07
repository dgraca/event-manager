<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\MagicAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Laravel\Jetstream\Jetstream;

class MagicRegisterController extends Controller
{
    public function store() {
        // Validate the request
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        // Check if the user already exists
        $user = User::where('email', $attributes['email'])->first();

        if (!$user) {
            // create a new user
            $user = User::create($attributes);

            // Assign the default role to the user
            $user->assignRole('user');
            $user->save();

            // Send a link to verify the email
            $user->sendEmailVerificationNotification();
        }

        return back()->with('status', 'We have emailed your magic link!');
    }
}
