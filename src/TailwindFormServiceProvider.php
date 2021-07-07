<?php

namespace Shirish71\TailwindForm;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class TailwindFormServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tailwind-form');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tailwind-form');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('tailwind-form.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/tailwind-form'),
            ], 'views');
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tailwind-form');

        Blade::directive('bind', function ($bind) {
            return '<?php app(\Shirish71\TailwindForm\FormDataBinder::class)->bind('.$bind.'); ?>';
        });
        Blade::directive('endbind', function () {
            return '<?php app(\Shirish71\TailwindForm\FormDataBinder::class)->pop(); ?>';
        });
        Blade::directive('wire', function ($modifier) {
            return '<?php app(\Shirish71\TailwindForm\FormDataBinder::class)->wire('.$modifier.'); ?>';
        });
        Blade::directive('endwire', function () {
            return '<?php app(\Shirish71\TailwindForm\FormDataBinder::class)->endwire(); ?>';
        });

        $prefix = config('tailwind-form.prefix');

        Collection::make(config('tailwind-form.components'))->each(
            fn($component, $alias) => Blade::component($alias, $component['class'], $prefix)
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.' /../config/config.php', 'tailwind-form');

        // Register the main class to use with the facade
        $this->app->singleton(FormDataBinder::class, fn() => new FormDataBinder);
    }
}
