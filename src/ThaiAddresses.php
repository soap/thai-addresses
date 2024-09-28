<?php

namespace Soap\ThaiAddresses;

class ThaiAddresses
{
    protected $config;

    public function __construct()
    {
        $this->config = config('thai-addresses');
    }

    /**
     * Get geograpy table name (ตารางสำหรับข้อมูลภาค)
     */
    public function getGeographyTableName(): string
    {
        return $this->config['geography']['table_name'];
    }

    /**
     * Get province table name (ตารางสำหรับข้อมูลจังหวัด)
     */
    public function getProvinceTableName(): string
    {
        return $this->config['province']['table_name'];
    }

    /**
     * Get district table name (ตารางสำหรับข้อมูลอำเภอ)
     */
    public function getDistrictTableName(): string
    {
        return $this->config['district']['table_name'];
    }

    /**
     * Get subdistrict table name (ตารางสำหรับข้อมูลตำบล/เทศบาล)
     */
    public function getSubdistrictTableName(): string
    {
        return $this->config['subdistrict']['table_name'];
    }

    public function getAddressTableName(): string
    {
        return $this->config['address']['table_name'];
    }

    /**
     * Get geograpy foreign key name (อ้างอิงจากตารางจังหวัด)
     */
    public function getGeographyForeignKeyName(): string
    {
        return $this->config['geography']['foreign_key'];
    }

    /**
     * Get province foreign key name (อ้างอิงโดยตารางอำเภอ)
     */
    public function getProvinceForeignKeyName(): string
    {
        return $this->config['province']['foreign_key'];
    }

    /**
     * Get district foreign key name (อ้างอิงโดยตารางภาค)
     */
    public function getDistrictForeignKeyName(): string
    {
        return $this->config['district']['foreign_key'];
    }
}
