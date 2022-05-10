<?php

namespace Soap\ThaiProvinces\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Soap\ThaiProvinces\Tests\TestCase;
use Soap\ThaiProvinces\Models\Province;

class ProvinceTest extends TestCase
{
    use RefreshDatabase;

    function a_province_has_name_th()
    {
        $province = Province::factory()->create([
            "name_th" => "กระบี่",
            "name_en" => "Krabi",
            "code" => "000",
        ]);
        
        $this->assertEquals("กระบี่", $province->name_th);
    }

    function a_province_has_name_en()
    {
        $province = Province::factory()->make([
            "name_th" => 'กระบี่',
            "name_en" => 'Krabi',
            "code" => '000',
        ]);
        $this->assertEquals('Krabi', $province->name_en);
    }
}