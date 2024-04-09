<?php

namespace Masuresh124\AgreeTerms\Providers;

use Illuminate\Support\ServiceProvider;

class AgreeTermsProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/agree-terms.php',
            'agree-terms'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->publishes([
            __DIR__ . '/../../config/agree-terms.php' => config_path('agree-terms.php'),
        ], 'agree-terms');
        $this->publishes([
            __DIR__ . '/../views' => resource_path('views'),
        ], 'agree-terms');

    }
}
