<?php

namespace Soap\ThaiAddresses\Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Soap\ThaiAddresses\Models\Subdistrict;

class SubdistrictSeeder extends Seeder
{
    public function run()
    {
        Subdistrict::query()->delete();
        if (File::exists(base_path('/vendor/soap/thai-addresses/database/seeders/data/subdistricts.json'))) {
            $json = File::get(base_path('/vendor/soap/thai-addresses/database/seeders/data/subdistricts.json'));
        } else {
            $json = File::get(__DIR__.'/data/subdistricts.json');
        }

        $subdistricts = json_decode($json);

        foreach ($subdistricts as $item) {
            Subdistrict::create([
                'id' => $item->id,
                'zip_code' => $item->zip_code,
                'name_th' => $item->name_th,
                'name_en' => $item->name_en,
                config('thai-addresses.district.foreign_key') => $item->district_id,
            ]);
        }
    }
}
