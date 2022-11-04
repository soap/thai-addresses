<?php

namespace Soap\ThaiAddresses\Database\Seeders;

use Illuminate\Database\Seeder;
use Soap\ThaiAddresses\Models\Subdistrict;
use File;
  
class SubdistrictSeeder extends Seeder
{

    public function run()
    {
        Subdistrict::query()->delete();
        $json = File::get(base_path('vendor/soap/thai-addresses/database/seeders/data/subdistricts.json'));
        $subdistricts = json_decode($json);

        foreach($subdistricts as $item) {
            Subdistrict::create([
                'id' => $item->id,
                'zip_code' => $item->zip_code,
                'name_th' => $item->name_th,
                'name_en' => $item->name_en,
                config('thai-addresses.district.foreign_key') => $item->district_id
            ]);
        }
    }

}