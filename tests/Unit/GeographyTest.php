<?php

namespace Soap\ThaiProvinces\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Soap\ThaiProvinces\Tests\TestCase;
use Soap\ThaiProvinces\Models\Geography;

class GeographyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_geography_has_name_th()
    {
        $region = Geography::factory()->create([
                "name_en" => "South",
                "name_th" => "ภาคใต้"
            ]);
            
        $this->assertEquals("ภาคใต้", $region->name_th);
    }

    /** @test */
    public function a_geography_has_name_en()
    {
        $region = Geography::factory()->create([
                    "name_en" => "North",
                    "name_th" => "ภาคเหนือ"
                ]);
                
        $this->assertEquals("North", $region->name_en);
    }
}
