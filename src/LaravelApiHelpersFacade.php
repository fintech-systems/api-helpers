<?php

namespace FintechSystems\LaravelApiHelpers;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FintechSystems\LaravelApiHelpers\LaravelApiHelpers
 */
class LaravelApiHelpersFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-api-helpers';
    }
}
