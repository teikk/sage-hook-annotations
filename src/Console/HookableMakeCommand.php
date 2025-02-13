<?php

namespace Teikk\SageHookAnnotations\Console;

use Illuminate\Contracts\Console\PromptsForMissingInput;
use Roots\Acorn\Console\Commands\GeneratorCommand;

class HookableMakeCommand extends GeneratorCommand implements PromptsForMissingInput
{
    protected $signature = 'hooks:make
                            {name : The name of hookable class}';

    protected $description = 'Generate hookable class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Hook';

    public function getStub()
    {
        return __DIR__.'/stubs/hookable.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Hooks';
    }
}
