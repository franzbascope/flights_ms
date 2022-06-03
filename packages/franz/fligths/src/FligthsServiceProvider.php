<?php

namespace Franz\Fligths;

use Franz\Fligths\Airport\AirportClient;
use Franz\Fligths\Airport\IAirportClient;
use Franz\Fligths\Repositories\AddFlightProgram;
use Franz\Fligths\Repositories\IAddFlightProgram;
use Franz\Fligths\Repositories\IItinieraryRepository;
use Franz\Fligths\Repositories\ItineraryRepository;
use Illuminate\Support\ServiceProvider;

class FligthsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'franz');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'franz');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/fligths.php', 'fligths');
        $this->app->bind(IAddFlightProgram::class,AddFlightProgram::class);
        $this->app->bind(IItinieraryRepository::class,ItineraryRepository::class);
        $this->app->bind(IAirportClient::class,AirportClient::class);

        // Register the service the package provides.
        $this->app->singleton('fligths', function ($app) {
            return new Fligths;
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fligths'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/fligths.php' => config_path('fligths.php'),
        ], 'fligths.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/franz'),
        ], 'fligths.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/franz'),
        ], 'fligths.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/franz'),
        ], 'fligths.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
