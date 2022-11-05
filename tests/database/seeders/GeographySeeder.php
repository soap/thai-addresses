<?php

namespace Soap\ThaiAddresses\Tests\Database\Seeders;

use Illuminate\Database\Seeder;
use Soap\ThaiAddresses\Models\Geography;
use File;
  
class GeographySeeder extends Seeder
{

    public function run()
    {
        Geography::query()->delete();
        $json = File::get(__DIR__ . '/../../../database/seeders/data/geographies.json');
        $geographies = json_decode($json);

        foreach($geographies as $item) {
            Geography::forceCreate([
                'id' => $item->id,
                'name_th' => $item->name_th,
                'name_en' => $item->name_en
            ]);
        }
    }

}