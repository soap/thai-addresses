<?php

namespace Soap\ThaiAddresses\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Soap\ThaiAddresses\Tests\Database\Seeders\DatabaseSeeder;
use Soap\ThaiAddresses\Tests\Models\User;
use Soap\ThaiAddresses\ThaiAddressesServiceProvider;

class TestCase extends Orchestra
{
    //use SeedDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh', [
            '--force' => true,
            '--seed' => false,
            '--path' => __DIR__.'/../../database/migrations', //package migration path
            '--realpath' => true,
        ])->run();

        $this->artisan('migrate', [
            '--force' => true,
            '--seed' => false,
            '--path' => __DIR__.'/../database/migrations', //test migration path
            '--realpath' => true,
        ])->run();

        $this->seed(DatabaseSeeder::class);

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Soap\\ThaiAddresses\\Tests\\Database\\Factories\\'.class_basename($modelName).'Factory'
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
        config()->set('auth.providers.users.model', User::class);
        config()->set('database.default', 'testing');

        config()->set('database.connections.mysql', [
            'driver' => 'mysql',
            'database' => 'thai_addresses_package_test',
            'host' => '127.0.0.1',
            'username' => 'root',
            'prefix' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ]);
    }
}
