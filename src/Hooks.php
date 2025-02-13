<?php

namespace Teikk\SageHookAnnotations;

use Roots\Acorn\Application;
use Illuminate\Support\Collection;
use WpHookAnnotations\Hooks\HookManager;

class Hooks
{
    protected $booted = false;

    public function __construct(public Application $app)
    {
    }

    public function boot(): void
    {
        if ($this->booted) {
            return;
        }

        Collection::make(config('hooks'))
            ->filter(fn ($provider) => class_exists($provider))
            ->map(fn($hookableClass) => $this->app->make($hookableClass))
            ->filter(fn($hookable) => ($hookable instanceof Hookable) && $hookable->shouldHook())
            ->each(fn($hookable) => $hookable->processHooks($this->app->get(HookManager::class)));

        $this->booted = true;
    }
}
