<?php

namespace Soap\ThaiAddresses\Tests\Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Soap\ThaiAddresses\Facades\ThaiAddresses;
use Soap\ThaiAddresses\Models\Province;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        Province::query()->delete();
        $json = File::get(__DIR__.'/../../../database/seeders/data/provinces.json');
        $provinces = json_decode($json);

        foreach ($provinces as $item) {
            Province::forceCreate([
                'id' => $item->id,
                'code' => $item->code,
                'name_th' => $item->name_th,
                'name_en' => $item->name_en,
                ThaiAddresses::getGeographyForeignKeyName() => $item->geography_id,
            ]);
        }
    }
}
