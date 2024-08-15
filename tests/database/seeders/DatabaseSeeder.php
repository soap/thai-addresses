<?php

namespace Soap\ThaiAddresses\Tests\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GeographySeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            SubdistrictSeeder::class,
        ]);
    }
}
