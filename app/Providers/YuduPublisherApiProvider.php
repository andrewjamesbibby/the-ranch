<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Yudu\Publisher\Publisher;

class YuduPublisherApiProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Publisher::class, function ($app) {
            return new Publisher(config('yudu.key'), config('yudu.secret'), [ 'debug' => true ]);
        });
    }
}
