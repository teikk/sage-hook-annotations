<?php

declare(strict_types=1);

namespace Teikk\SageHookAnnotations\Contracts;

use WpHookAnnotations\Hooks\HookManager;

interface Hookable
{
    public function shouldHook(): bool;

    public function processHooks(HookManager $hookManager): void;
}
