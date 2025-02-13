<?php

declare(strict_types=1);

namespace Teikk\SageHookAnnotations;

use WpHookAnnotations\Hooks\HookAware;
use Teikk\SageHookAnnotations\Contracts\Hookable as HookableContract;

abstract class Hookable implements HookableContract
{
    use HookAware;

    public function shouldHook(): bool
    {
        return true;
    }
}
