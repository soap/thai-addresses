<?php

namespace Soap\ThaiAddresses\Tests;

use Illuminate\Config\Repository;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;

use function Orchestra\Testbench\workbench_path;

use Soap\ThaiAddresses\Tests\Models\User;
use Soap\ThaiAddresses\ThaiAddressesServiceProvider;

class TestCase extends Orchestra
{
    // autoload using workbench.yaml
    use RefreshDatabase;
    use WithWorkbench;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            if (Str::startsWith($modelName, 'Workbench\\App\\Models\\')) {
                // Factories within the tests directory
                return 'Workbench\\Database\\Factories\\'.class_basename($modelName).'Factory';
            }

            return 'Soap\\ThaiAddresses\\Tests\\Database\\Factories\\'.class_basename($modelName).'Factory';
        });

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations'); // load package's migrations
    }

    protected function getPackageProviders($app)
    {
        return [
            ThaiAddressesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        tap($app['config'], function (Repository $config) {
            $config->set('auth.providers.users.model', User::class);
            $config->set('database.default', 'testing');

            $config->set('database.connections.mysql', [
                'driver' => 'mysql',
                'database' => 'thai_addresses_package_test',
                'host' => '127.0.0.1',
                'username' => 'root',
                'prefix' => '',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
            ]);
        });
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(workbench_path('database/migrations'));
    }
}
