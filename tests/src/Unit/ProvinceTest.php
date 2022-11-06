<?php

namespace Soap\ThaiAddresses\Tests\Unit;

use Soap\ThaiAddresses\Models\Province;
use Soap\ThaiAddresses\Tests\TestCase;

class ProvinceTest extends TestCase
{
    /** @test */
    public function a_province_has_name_th()
    {
        $province = Province::where('name_en', '=', 'Krabi')->first();
        $this->assertEquals('กระบี่', $province->name_th, 'province has Thai name');
    }

    /** @test */
    public function a_province_has_name_en()
    {
        $province = Province::where('name_th', '=', 'กระบี่')->first();
        $this->assertEquals('Krabi', $province->name_en, 'province has English name');
    }

    /** @test */
    public function a_province_belongs_to_region()
    {
        $province = Province::where('name_en', '=', 'Krabi')->first();
        $this->assertEquals('ภาคใต้', $province->geography->name_th, 'province belongs to region');
    }
}
