<?php

namespace Soap\ThaiAddresses;

use Illuminate\Contracts\Container\BindingResolutionException;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class ThaiAddresses
{
    /**
     * Get geograpy table name (ตารางสำหรับข้อมูลภาค)
     * @return mixed 
     * @throws BindingResolutionException 
     * @throws NotFoundExceptionInterface 
     * @throws ContainerExceptionInterface 
     */
    public function getGeographyTableName()
    {
        return config('thai-addresses.geography.table_name');
    }

    /**
     * Get province table name (ตารางสำหรับข้อมูลจังหวัด)
     * @return mixed 
     * @throws BindingResolutionException 
     * @throws NotFoundExceptionInterface 
     * @throws ContainerExceptionInterface 
     */
    public function getProvinceTableName()
    {
        return config('thai-addresses.province.table_name');
    }

    /**
     * Get district table name (ตารางสำหรับข้อมูลอำเภอ)
     * @return mixed 
     * @throws BindingResolutionException 
     * @throws NotFoundExceptionInterface 
     * @throws ContainerExceptionInterface 
     */
    public function getDistrictTableName()
    {
        return config('thai-addresses.district.table_name');
    }

    /**
     * Get subdistrict table name (ตารางสำหรับข้อมูลตำบล/เทศบาล)
     * @return mixed 
     * @throws BindingResolutionException 
     * @throws NotFoundExceptionInterface 
     * @throws ContainerExceptionInterface 
     */
    public function getSubdistrictTableName()
    {
        return config('thai-addresses.subdistrict.table_name');
    }

    public function getAddressTableName()
    {
        return config('thai-addresses.address.table_name');
    }
    /**
     * Get geograpy foreign key name (อ้างอิงจากตารางจังหวัด)
     * @return mixed 
     * @throws BindingResolutionException 
     * @throws NotFoundExceptionInterface 
     * @throws ContainerExceptionInterface 
     */
    public function getGeographyForeignKeyName()
    {
        return config('thai-addresses.geography.foreign_key');
    }

    /**
     * Get province foreign key name (อ้างอิงโดยตารางอำเภอ)
     * @return mixed 
     * @throws BindingResolutionException 
     * @throws NotFoundExceptionInterface 
     * @throws ContainerExceptionInterface 
     */
    public function getProvinceForeignKeyName()
    {
        return config('thai-addresses.province.foreign_key');
    }

    /**
     * Get district foreign key name (อ้างอิงโดยตารางภาค)
     * @return mixed 
     * @throws BindingResolutionException 
     * @throws NotFoundExceptionInterface 
     * @throws ContainerExceptionInterface 
     */
    public function getDistrictForeignKeyName()
    {
        return config('thai-addresses.district.foreign_key');
    }

}
