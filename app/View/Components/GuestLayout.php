<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest')
            ->with('darkMode', request()->cookie('dark_mode', 'light'))
            ->with('colorScheme', request()->cookie('color_scheme', 'default'));
    }
}
