<?php

namespace Soamn\Maple;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Soamn\Maple\Console\InstallCommand;

class UiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'maple');

        Blade::componentNamespace('Soamn\\Maple\\Components', 'maple');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/maple'),
        ], 'maple-views');
    }
    public function register()
    {
        $this->commands([
            InstallCommand::class,
        ]);

    }
    
}
