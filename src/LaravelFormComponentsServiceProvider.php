<?php

namespace Shirish71\LaravelFormComponents;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class LaravelFormComponentsServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-form-components');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-form-components');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-form-components.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-form-components'),
            ], 'views');
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-form-components');

        Blade::directive('bind', function ($bind) {
            return '<?php app(\Shirish71\LaravelFormComponents\FormDataBinder::class)->bind('.$bind.'); ?>';
        });
        Blade::directive('endbind', function () {
            return '<?php app(\Shirish71\LaravelFormComponents\FormDataBinder::class)->pop(); ?>';
        });
        Blade::directive('wire', function ($modifier) {
            return '<?php app(\Shirish71\LaravelFormComponents\FormDataBinder::class)->wire('.$modifier.'); ?>';
        });
        Blade::directive('endwire', function () {
            return '<?php app(\Shirish71\LaravelFormComponents\FormDataBinder::class)->endwire(); ?>';
        });

        $prefix = config('laravel-form-components.prefix');

        Collection::make(config('laravel-form-components.components'))->each(
            fn($component, $alias) => Blade::component($alias, $component['class'], $prefix)
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.' /../config/config.php', 'laravel-form-components');

        // Register the main class to use with the facade
        $this->app->singleton(FormDataBinder::class, fn() => new FormDataBinder);
    }
}
