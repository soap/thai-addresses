<?php

namespace Soap\ThaiProvinces\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Soap\ThaiProvinces\Tests\TestCase;
use Soap\ThaiProvinces\Models\Province;

class ProvinceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_province_has_name_th()
    {
        $province = Province::factory()->create([
            'name_th' => 'กระบี่',
            'name_eng' => 'Krabi',
            'code' => '000',
        ]);
        
        $this->assertEquals('กระบี่', $province->name_th);
    }

    /** @test */
    function a_province_has_name_eng()
    {
        $province = Province::factory()->create([
            'name_th' => 'กระบี่',
            'name_eng' => 'Krabi',
            'code' => '000',
        ]);
        $this->assertEquals('Krabi', $province->name_eng);
    }
}