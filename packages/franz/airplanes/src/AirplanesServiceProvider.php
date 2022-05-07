<?php

namespace Franz\Airplanes;

use Franz\Airplanes\Repository\AircraftRepository;
use Franz\Airplanes\Repository\IAircraftRepository;
use Illuminate\Support\ServiceProvider;

class AirplanesServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__.'/../config/airplanes.php', 'airplanes');

        // Register the service the package provides.
        $this->app->singleton('airplanes', function ($app) {
            return new Airplanes;
        });
        $this->app->bind(IAircraftRepository::class, function ($app) {
            return $app->make(AircraftRepository::class);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['airplanes'];
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
            __DIR__.'/../config/airplanes.php' => config_path('airplanes.php'),
        ], 'airplanes.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/franz'),
        ], 'airplanes.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/franz'),
        ], 'airplanes.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/franz'),
        ], 'airplanes.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
