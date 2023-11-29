<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Vite;
use Illuminate\View\Component;
use Illuminate\View\View;

class LandingLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        //force to use the correct build directory for this template
        Vite::useBuildDirectory('frontend-assets');
        return view('layouts.tailwind.landing');
    }
}
