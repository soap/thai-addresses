<?php

namespace Soap\ThaiAddresses\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Soap\ThaiAddresses\ThaiAddressesServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

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
        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        
        config()->set('database.connections.mysql', [
            'driver' => 'mysql',
            'database' => 'thai_provinces_demo',
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'prefix' => '',
        ]);

        $migration = include __DIR__.'/../database/migrations/create_thai_geographies_table.php';
        $migration->up();

        $migration = include __DIR__.'/../database/migrations/create_thai_provinces_table.php';
        $migration->up();
    }
}
