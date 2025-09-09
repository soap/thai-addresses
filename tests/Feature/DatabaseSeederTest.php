<?php

use Soap\ThaiAddresses\Models\District;
use Soap\ThaiAddresses\Models\Geography;
use Soap\ThaiAddresses\Models\Province;
use Soap\ThaiAddresses\Models\Subdistrict;

test('seeder commands are working', function () {
    // seeder was done in TestCase.php
    $regions = Geography::all();
    expect($regions)->toHaveCount(6, '6 regions exists');

    $provinces = Province::all();
    expect($provinces)->toHaveCount(77, '77 provinces exists');

    $districts = District::all();
    expect($districts)->toHaveCount(1006, '1006 districts exists');

    $subdistricts = Subdistrict::all();
    expect($subdistricts)->toHaveCount(8913, '8913 subdistricts exists');
});
