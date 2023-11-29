<?php

namespace App\Providers;

//use App\View\Composers\FrontendBottomMenuComposer;
//use App\View\Composers\FrontendTopMenuComposer;
use App\View\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer(['components.mobile-menu.index', 'components.side-menu.index', 'components.top-bar.index'], MenuComposer::class);
        //View::composer(['layouts.tailwind._navbar_center'], FrontendTopMenuComposer::class);
        //View::composer(['layouts.tailwind._footer_transparent'], FrontendBottomMenuComposer::class);
    }
}
