<?php

namespace Soap\ThaiAddresses\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Soap\ThaiAddresses\Tests\Database\Seeders\GeographySeeder;
use Soap\ThaiAddresses\Tests\Database\Seeders\ProvinceSeeder;
use Soap\ThaiAddresses\Tests\Database\Seeders\DistrictSeeder;
use Soap\ThaiAddresses\Tests\Database\Seeders\SubdistrictSeeder;
use Soap\ThaiAddresses\ThaiAddressesServiceProvider;

class TestCase extends Orchestra 
{
    use SeedDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh', [
            '--force' => true,
            '--path' => __DIR__ . '/../database/migrations',
            '--realpath' => true,
        ]);

        SeedDatabaseState::$seeded = false;
        SeedDatabaseState::$seeders = [
            GeographySeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            SubdistrictSeeder::class
        ];
        
        $this->seedDatabase();
        
        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Soap\\ThaiAddresses\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ThaiAddressesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'mysql');
        config()->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        config()->set('database.connections.mysql', [
            'driver' => 'mysql',
            'database' => 'thai_addresses_package_test',
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'prefix' => '',
        ]);

    }
}
