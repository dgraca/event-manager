<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class DarkModeController extends Controller
{
    /**
     * Switch dark/light mode.
     *
     */
    public function switch(): RedirectResponse
    {
        $darkMode = request()->cookie('dark_mode', 'light') === 'light' ? 'dark' : 'light';
        return back()->withCookie(cookie('dark_mode', $darkMode, 60*24*365));
    }
}
