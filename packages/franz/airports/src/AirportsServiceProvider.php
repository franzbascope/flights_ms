<?php

namespace Franz\Airports;

use Franz\Airports\Database\AirportSeeds;
use Franz\Airports\Repositories\AirportRepository;
use Franz\Airports\Repositories\IAirportRepository;
use Illuminate\Support\ServiceProvider;


class AirportsServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__.'/../config/airports.php', 'airports');

        // Register the service the package provides.
        $this->app->singleton('airports', function ($app) {
            return new Airports;
        });
        $this->app->bind(IAirportRepository::class, function ($app) {
            return $app->make(AirportRepository::class);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['airports'];
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
            __DIR__.'/../config/airports.php' => config_path('airports.php'),
        ], 'airports.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/franz'),
        ], 'airports.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/franz'),
        ], 'airports.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/franz'),
        ], 'airports.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
