<?php

namespace Masuresh124\AgreeTerms\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Masuresh124\AgreeTerms\Http\Middleware\AgreeTermsMiddleware;

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

        // Register the route middleware alias so consumers don't need to edit
        // Kernel.php / bootstrap/app.php manually. aliasMiddleware() exists from
        // Laravel 5.4+; fall back to middleware() for 5.2/5.3.
        $router = $this->app->make(Router::class);
        if (method_exists($router, 'aliasMiddleware')) {
            $router->aliasMiddleware('agree-terms', AgreeTermsMiddleware::class);
        } else {
            $router->middleware('agree-terms', AgreeTermsMiddleware::class);
        }
        $this->publishes([
            __DIR__ . '/../../config/agree-terms.php' => config_path('agree-terms.php'),
        ], 'config-agree-terms');
        $this->publishes([
            __DIR__ . '/../views' => resource_path('views'),
        ], 'agree-terms');

    }
}
