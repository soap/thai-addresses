<?php

return [
    // model definition
    "geography" => [
        "table_name" => "thai-geographies",
        "foreign_key" => "geography_id"
    ],

    "province" => [
        "table_name" => "thai-provinces",
        "foreign_key" => "province_id"
    ],
    
    "district" => [
        "table_name" => "thai-districts",
        "foreign_key" => "district_id"
    ],

    "subdistrict" => [
        "table_name" => "thai-subdistricts",
    ],

    "address" => [
        "table_name" => "addresses",
        "model" => \Soap\ThaiAddresses\Models\Address::class
    ]
];
