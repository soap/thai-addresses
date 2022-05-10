<?php

namespace Soap\ThaiProvinces\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Soap\ThaiProvinces\ThaiProvinces
 */
class ThaiProvinces extends Facade
{
    /**
     * Alias of dynamic class, need to be registered in service provider
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'thai-provinces';
    }
}
