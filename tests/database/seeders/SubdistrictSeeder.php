<?php

namespace Soap\ThaiAddresses\Tests\Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Soap\ThaiAddresses\Facades\ThaiAddresses;
use Soap\ThaiAddresses\Models\Subdistrict;

class SubdistrictSeeder extends Seeder
{
    public function run()
    {
        Subdistrict::query()->delete();
        $json = File::get(__DIR__ . '/../../../database/seeders/data/subdistricts.json');
        $subdistricts = json_decode($json);

        foreach ($subdistricts as $item) {
            Subdistrict::forceCreate([
                'id' => $item->id,
                'zip_code' => $item->zip_code,
                'name_th' => $item->name_th,
                'name_en' => $item->name_en,
                ThaiAddresses::getDistrictForeignKeyName() => $item->district_id,
            ]);
        }
    }
}
