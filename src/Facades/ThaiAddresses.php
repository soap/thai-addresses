<?php

namespace Soap\ThaiAddresses\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Soap\ThaiProvinces\ThaiAddesses
 */
class ThaiAddresses extends Facade
{
    /**
     * Alias of dynamic class, need to be registered in service provider
     */
    protected static function getFacadeAccessor(): string
    {
        return \Soap\ThaiAddresses\ThaiAddresses::class;
    }
}
