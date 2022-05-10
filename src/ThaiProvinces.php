<?php

namespace Soap\ThaiProvinces;


class ThaiProvinces
{
    public function getProvinceTableName()
    {
        return config('thai-provinces.province.table_name');
    }

    public function getDistrictTableName()
    {
        return config('thai-provinces.district.table_name');
    }

    public function getGeoGraphyTableName()
    {
        return config('thai-provinces.geography.table_name');
    }

    public function getProvinceIdName()
    {
        return config('thai-provinces.district.province_id');
    }

    public function getGeograpyIdName()
    {
        return config('thai-provinces.province.geopgraphy_id');
    }
}
