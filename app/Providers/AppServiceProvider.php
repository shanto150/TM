<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Debugbar::disable();
        view()->share('districts', DB::table('districts')->where('division_id', 1)->get());
    }
}
