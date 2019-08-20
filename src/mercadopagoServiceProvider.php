<?php

namespace medrex\mercadopago;

use Illuminate\Support\ServiceProvider;
use medrex\mercadopago\mercadopago;

class mercadopagoServiceProvider extends ServiceProvider
{

    protected $mp_app_id;
    protected $mp_app_secret;
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'medrex');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'medrex');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

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
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/mercadopago.php', 'mercadopago');

        // Register the service the package provides.
        $this->app->singleton('mercadopago', function ($app) {
            return new mercadopago($this->mp_app_id, $this->mp_app_secret);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['mercadopago'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/mercadopago.php' => config_path('mercadopago.php'),
        ], 'mercadopago.config');

        $this->mp_app_id     = config('mercadopago.app_id');
        $this->mp_app_secret = config('mercadopago.app_secret');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/medrex'),
        ], 'mercadopago.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/medrex'),
        ], 'mercadopago.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/medrex'),
        ], 'mercadopago.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}