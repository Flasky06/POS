<?php

namespace App\Providers;

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Vite;
>>>>>>> 910265b (Initial commit after reinitializing Git)
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
<<<<<<< HEAD
        //
=======
        Vite::prefetch(concurrency: 3);
>>>>>>> 910265b (Initial commit after reinitializing Git)
    }
}
