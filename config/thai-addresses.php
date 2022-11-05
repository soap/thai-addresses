<?php

return [
    // model definition
    "geography" => [
        "table_name" => "thai_geographies",
        "foreign_key" => "geography_id"
    ],

    "province" => [
        "table_name" => "thai_provinces",
        "foreign_key" => "province_id"
    ],
    
    "district" => [
        "table_name" => "thai_districts",
        "foreign_key" => "district_id"
    ],

    "subdistrict" => [
        "table_name" => "thai_subdistricts",
    ],

    "address" => [
        "table_name" => "addresses",
        "model" => \Soap\ThaiAddresses\Models\Address::class
    ]
];
