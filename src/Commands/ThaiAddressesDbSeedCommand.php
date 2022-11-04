<?php

namespace Soap\ThaiAddresses\Commands;

use Illuminate\Console\Command;

class ThaiAddressesDbSeedCommand extends Command
{
    public $signature = 'thai-addresses:db-seed';

    public $description = 'Seed thai addresses database (4 tables)';

    public function handle(): int
    {
        $this->info('Seeding geography database ...');
        $this->call('db:seed', [
            '--class' => 'Soap\ThaiAddresses\Database\Seeders\GeographySeeder',
        ]);

        $this->info('Seeding province database ...');
        $this->call('db:seed', [
            '--class' => 'Soap\ThaiAddresses\Database\Seeders\ProvinceSeeder',
        ]);

        $this->info('Seeding district database ...');
        $this->call('db:seed', [
            '--class' => 'Soap\ThaiAddresses\Database\Seeders\DistrictSeeder',
        ]);


        $this->info('Seeding subdistrict database ...');
        $this->call('db:seed', [
            '--class' => 'Soap\ThaiAddresses\Database\Seeders\SubdistrictSeeder',
        ]);


        $this->comment('All done');

        return self::SUCCESS;
    }
}
