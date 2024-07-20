<?php

namespace App\Providers;


use App\View\Components\MainLayout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\LogInMainLayout;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('main-layout', MainLayout::class);
        Blade::component('loginmain-layout', LogInMainLayout::class);
    }
}
