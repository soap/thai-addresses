<?php

return [
    // model definition
    "geography" => [
        "table_name" => "thai_geographies"
    ],

    "province" => [
        "table_name" => "thai_provinces",
        "geography_id" => "geography_id"
    ],
    
    "district" => [
        "table_name" => "amphures",
        "province_id" => "province_id"
    ]
];
