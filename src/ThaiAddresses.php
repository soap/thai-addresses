<?php

namespace Soap\ThaiAddresses;

class ThaiAddresses
{
    public static function getSubdistrictTableName(): string
    {
        // ตรวจสอบว่า config ถูกโหลดหรือไม่
        if (! function_exists('config') || ! config()) {
            return 'thai_subdistricts'; // default fallback
        }

        $tableName = config('thai-addresses.subdistrict.table_name');

        // Return default if config is null
        return $tableName ?? 'thai_subdistricts';
    }

    public static function getDistrictTableName(): string
    {
        if (! function_exists('config') || ! config()) {
            return 'thai_districts';
        }

        $tableName = config('thai-addresses.district.table_name');

        return $tableName ?? 'thai_districts';
    }

    public static function getProvinceTableName(): string
    {
        if (! function_exists('config') || ! config()) {
            return 'thai_provinces';
        }

        $tableName = config('thai-addresses.province.table_name');

        return $tableName ?? 'thai_provinces';
    }

    public static function getGeographyTableName(): string
    {
        if (! function_exists('config') || ! config()) {
            return 'thai_geographies';
        }

        $tableName = config('thai-addresses.geography.table_name');

        return $tableName ?? 'thai_geographies';
    }

    public static function getAddressTableName(): string
    {
        if (! function_exists('config') || ! config()) {
            return 'addresses';
        }

        $tableName = config('thai-addresses.address.table_name');

        return $tableName ?? 'addresses';
    }

    /**
     * Get geography foreign key name (อ้างอิงจากตารางจังหวัด)
     */
    public static function getGeographyForeignKeyName(): string
    {
        if (! function_exists('config') || ! config()) {
            return 'geography_id';
        }
        $key = config('thai-addresses.geography.foreign_key');

        return $key ?? 'geography_id';
    }

    /**
     * Get province foreign key name (อ้างอิงโดยตารางอำเภอ)
     */
    public static function getProvinceForeignKeyName(): string
    {
        if (! function_exists('config') || ! config()) {
            return 'province_id';
        }
        $key = config('thai-addresses.province.foreign_key');

        return $key ?? 'province_id';
    }

    /**
     * Get district foreign key name (อ้างอิงโดยตารางภาค)
     */
    public static function getDistrictForeignKeyName(): string
    {
        if (! function_exists('config') || ! config()) {
            return 'district_id';
        }
        $key = config('thai-addresses.district.foreign_key');

        return $key ?? 'district_id';
    }

    /**
     * Get district foreign key name (อ้างอิงโดยตารางภาค)
     */
    public static function getSubdistrictForeignKeyName(): string
    {
        if (! function_exists('config') || ! config()) {
            return 'subdistrict_id';
        }
        $key = config('thai-addresses.subdistrict.foreign_key');

        return $key ?? 'subdistrict_id';
    }

    public static function getAddressForeignKeyName(): string
    {
        if (! function_exists('config') || ! config()) {
            return 'address_id';
        }
        $key = config('thai-addresses.address.foreign_key');

        return $key ?? 'address_id';
    }

    public static function lastUpdated()
    {
        return '2025-09-09';
    }
}
