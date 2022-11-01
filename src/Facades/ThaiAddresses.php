<?php

namespace Soap\ThaiAddresses\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Soap\ThaiProvinces\ThaiProvinces
 */
class ThaiAddresses extends Facade
{
    /**
     * Alias of dynamic class, need to be registered in service provider
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'thai-addresses';
    }
}
