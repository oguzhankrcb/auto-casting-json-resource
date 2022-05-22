<?php

namespace Oguzhankrcb\AutoCastingJsonResource\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Oguzhankrcb\AutoCastingJsonResource\AutoCastingJsonResource
 */
class AutoCastingJsonResource extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'auto-casting-json-resource';
    }
}
