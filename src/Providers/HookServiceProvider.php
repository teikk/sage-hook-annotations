<?php

namespace Teikk\SageHookAnnotations\Providers;

use Teikk\SageHookAnnotations\Hooks;
use Illuminate\Support\ServiceProvider;
use WpHookAnnotations\Hooks\HookManager;
use Teikk\SageHookAnnotations\Console\HookableMakeCommand;

class HookServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/hooks.php',
            'hooks'
        );

        $this->app->singleton(HookManager::class);
        $this->app->singleton(Hooks::class, fn () => new Hooks($this->app));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/hooks.php' => $this->app->configPath('hooks.php'),
        ], 'sage-hook-annotations');

        $hooks = $this->app->make(Hooks::class);
        $hooks->boot();

        if ($this->app->runningInConsole()) {
            $this->commands([
                HookableMakeCommand::class
            ]);
        }
    }
}

