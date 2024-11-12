<?php

namespace Soap\ThaiAddresses\Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Soap\ThaiAddresses\Models\Geography;

class GeographySeeder extends Seeder
{
    public function run()
    {
        Geography::query()->delete();
        if (File::exists(base_path('/vendor/soap/thai-addresses/database/seeders/data/geographies.json'))) {
            $json = File::get(base_path('/vendor/soap/thai-addresses/database/seeders/data/geographies.json'));
        } else {
            $json = File::get(__DIR__.'/data/geographies.json');
        }
        $geographies = json_decode($json);

        foreach ($geographies as $item) {
            Geography::create([
                'id' => $item->id,
                'name_th' => $item->name_th,
                'name_en' => $item->name_en,
            ]);
        }
    }
}
