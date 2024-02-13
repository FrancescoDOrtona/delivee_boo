<?php

namespace App\Providers;

use Braintree\Gateway;
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
    public function boot()
    {
        $this->app->singleton(
            Gateway::class,
            function ($app) {
                return new Gateway([
                    'environment' => 'sandbox',
                    'merchantId' => 'q547bdcc9wvr47w2',
                    'publicKey' => 'c5562mmtmtcdv2pb',
                    'privateKey' => '2c4ba4cb1becbf173dafce5a22c567c3',
                ]);
            }
        );
    }
}
