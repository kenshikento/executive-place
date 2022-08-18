<?php

namespace App\Providers;

use App\Services\ApiDriverExchange;
use App\Services\CurrencyConvertorInterface;
use App\Services\LocalDriverExchange;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton(CurrencyConvertorInterface::class, fn() => new (config('currency.driver.service_class')));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
