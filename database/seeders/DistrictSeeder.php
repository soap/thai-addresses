<?php

namespace Soap\ThaiAddresses\Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Soap\ThaiAddresses\Models\District;
use Soap\ThaiAddresses\ThaiAddresses;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        if (! \Schema::hasTable((new District)->getTable())) {
            throw new \Exception('District table does not exist.');
        }
        District::query()->delete();
        if (File::exists(base_path('vendor/soap/thai-addresses/database/seeders/data/districts.json'))) {
            $json = File::get(base_path('vendor/soap/thai-addresses/database/seeders/data/districts.json'));
        } else {
            $json = File::get(realpath('database/seeders/data/districts.json'));
        }
        $districts = json_decode($json);

        foreach ($districts as $item) {
            District::create([
                'id' => $item->id,
                'code' => $item->code,
                'name_th' => $item->name_th,
                'name_en' => $item->name_en,
                ThaiAddresses::getProvinceForeignKeyName() => $item->province_id,
            ]);
        }
    }
}
