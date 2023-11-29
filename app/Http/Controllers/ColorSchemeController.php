<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ColorSchemeController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function switch(Request $request): RedirectResponse
    {
        return back()->withCookie(cookie('color_scheme', $request->color_scheme, 60*24*365));
    }
}
