<?php

namespace Soap\ThaiAddresses\Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Soap\ThaiAddresses\Facades\ThaiAddresses;
use Soap\ThaiAddresses\Models\Province;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        Province::query()->delete();
        if (File::exists(base_path('/vendor/soap/thai-addresses/database/seeders/data/provinces.json'))) {
            $json = File::get(base_path('/vendor/soap/thai-addresses/database/seeders/data/provinces.json'));
        } else {
            $json = File::get(__DIR__.'/data/provinces.json');
        }

        $provinces = json_decode($json);

        foreach ($provinces as $item) {
            Province::create([
                'id' => $item->id,
                'code' => $item->code,
                'name_th' => $item->name_th,
                'name_en' => $item->name_en,
                ThaiAddresses::getGeographyForeignKeyName() => $item->geography_id,
            ]);
        }
    }
}
