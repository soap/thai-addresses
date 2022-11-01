<?php

namespace Soap\ThaiAddresses;

class ThaiAddresses
{
    public function getProvinceTableName()
    {
        return config('thai-addresses.province.table_name');
    }

    public function getDistrictTableName()
    {
        return config('thai-addresses.district.table_name');
    }

    public function getGeographyTableName()
    {
        return config('thai-addresses.geography.table_name');
    }

    public function getProvinceIdName()
    {
        return config('thai-addresses.district.province_id');
    }

    public function getGeographyIdName()
    {
        return config('thai-addresses.province.geopgraphy_id');
    }
}
