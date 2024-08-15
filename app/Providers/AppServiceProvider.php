<?php

namespace App\Providers;

use App\Models\Instansi;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $domain = implode('.', array_slice(explode('.', request()->getHost()), 1));
            $instansi = Instansi::where('web', $domain)->first();
            $view->with('instansi', $instansi);
        });
    }
}
