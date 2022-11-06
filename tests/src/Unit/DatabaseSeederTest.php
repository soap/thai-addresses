<?php

namespace Soap\ThaiAddresses\Tests\Unit;

use Soap\ThaiAddresses\Models\District;
use Soap\ThaiAddresses\Models\Geography;
use Soap\ThaiAddresses\Models\Province;
use Soap\ThaiAddresses\Models\Subdistrict;
use Soap\ThaiAddresses\Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    /** @test */
    public function geography_records_exists()
    {
        $regions = Geography::all();
        $this->assertCount(6, $regions, '6 regions exists');
    }

    /** @test */
    public function province_records_existsh()
    {
        $provinces = Province::all();
        $this->assertCount(77, $provinces, '77 provinces exists');
    }

    /** @test */
    public function district_record_exists()
    {
        $districts = District::all();
        $this->assertCount(1006, $districts, '1006 districts exists');
    }

    /** @test */
    public function subdistrict_records_exists()
    {
        $subdistricts = Subdistrict::all();
        $this->assertCount(8913, $subdistricts, '8913 subdistricts exists');
    }
}
