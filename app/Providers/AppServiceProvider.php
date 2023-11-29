<?php

namespace App\Providers;

use App\Helpers\HelperMethods;
use App\Helpers\Setting;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('setting',function(){
            return new Setting();
        });
        $this->app->bind('helperMethods',function(){
            return new HelperMethods();
        });

        if ($this->app->runningInConsole()) {
            $this->app->register(\InfyOm\Generator\InfyOmGeneratorServiceProvider::class);
        }
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //override the infyom model generator to add extra informations
        $loader = AliasLoader::getInstance();
        $loader->alias('BinaryTorch\LaRecipe\Models\Documentation','App\Overrides\larecipe\Documentation');
        if ($this->app->isLocal()) {
            $loader->alias('InfyOm\Generator\Generators\Scaffold\ViewGenerator', 'App\Overrides\infyomlabs\ViewGenerator');
            $loader->alias('InfyOm\Generator\Generators\Scaffold\ControllerGenerator', 'App\Overrides\infyomlabs\ControllerGenerator');
            $loader->alias('InfyOm\Generator\Generators\ModelGenerator', 'App\Overrides\infyomlabs\ModelGenerator');
            $loader->alias('InfyOm\Generator\Generators\FactoryGenerator', 'App\Overrides\infyomlabs\FactoryGenerator');
        }


        //override of login request to enable recaptcha
       // $this->app->bind('Laravel\Fortify\Http\Requests\LoginRequest','App\Http\Requests\Auth\LoginRequest');
    }
}
