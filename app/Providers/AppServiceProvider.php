<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Providers\DriverManager;

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
        //
        // DriverManager::loadDriver(TelegramDriver::class);
    }
}
