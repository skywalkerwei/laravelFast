<?php

namespace App\Console\Commands\Repository;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Support\Repository\Traits\CommandTrait;

use Illuminate\Console\GeneratorCommand;
/**
 * Class Services 用来生成Services
 *
 * @package
 */
class ServicesCommand extends GeneratorCommand
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'core:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Services';

    protected function getStub()
    {
        return __DIR__.'/stubs/service.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace."\Services";
    }

}
