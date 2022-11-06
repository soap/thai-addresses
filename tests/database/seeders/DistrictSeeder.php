<?php

namespace Soap\ThaiAddresses\Tests\Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Soap\ThaiAddresses\Models\District;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        District::query()->delete();
        $json = File::get(__DIR__ . '/../../../database/seeders/data/districts.json');
        $districts = json_decode($json);

        foreach ($districts as $item) {
            District::forceCreate([
                'id' => $item->id,
                'code' => $item->code,
                'name_th' => $item->name_th,
                'name_en' => $item->name_en,
                config('thai-addresses.province.foreign_key') => $item->province_id,
            ]);
        }
    }
}
