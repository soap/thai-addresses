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
    use RefreshDatabase;
    use WithWorkbench;

    protected function setUp(): void
    {
        $this->loadEnvironmentVariables();

        parent::setUp();

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            if (Str::startsWith($modelName, 'Workbench\\App\\Models\\')) {
                return 'Workbench\\Database\\Factories\\'.class_basename($modelName).'Factory';
            }

            return 'Soap\\ThaiAddresses\\Tests\\Database\\Factories\\'.class_basename($modelName).'Factory';
        });

        $this->artisan('thai-addresses:db-seed');
    }

    protected function loadEnvironmentVariables(): void
    {
        // ลองโหลด .env.testing ก่อน
        foreach (['.env.testing', '.env'] as $file) {
            $path = __DIR__."/../{$file}";
            if (file_exists($path)) {
                $this->loadEnvFile($path);
            }
        }

        $this->setDefaultEnvironmentVariables();
    }

    protected function loadEnvFile(string $path): void
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            if (strpos($line, '=') !== false) {
                [$key, $value] = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value, " \t\n\r\0\x0B\"'");

                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
                putenv("$key=$value");
            }
        }
    }

    protected function setDefaultEnvironmentVariables(): void
    {
        $defaults = [
            'APP_ENV' => 'testing',
            'DB_CONNECTION' => 'mysql',
            'DB_HOST' => '127.0.0.1',
            'DB_PORT' => '3306',
            'DB_DATABASE' => 'thai_addresses_package_test',
            'DB_USERNAME' => 'root',
            'DB_PASSWORD' => '', // local default (GitHub Actions จะ override)
        ];

        foreach ($defaults as $key => $value) {
            if (! isset($_ENV[$key]) && ! isset($_SERVER[$key])) {
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
                putenv("$key=$value");
            }
        }
    }

    protected function getPackageProviders($app): array
    {
        return [
            ThaiAddressesServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        tap($app['config'], function (Repository $config) {
            $config->set('auth.providers.users.model', User::class);

            $connection = $_ENV['DB_CONNECTION'] ?? 'mysql';
            $config->set('database.default', $connection);

            if ($connection === 'mysql') {
                $config->set('database.connections.mysql', [
                    'driver' => 'mysql',
                    'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
                    'port' => $_ENV['DB_PORT'] ?? '3306',
                    'database' => $_ENV['DB_DATABASE'] ?? 'thai_addresses_package_test',
                    'username' => $_ENV['DB_USERNAME'] ?? 'root',
                    'password' => $_ENV['DB_PASSWORD'] ?? '',
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'prefix' => '',
                    'strict' => false,
                    'engine' => null,
                ]);
            }

            if ($connection === 'sqlite') {
                $config->set('database.connections.sqlite', [
                    'driver' => 'sqlite',
                    'database' => $_ENV['DB_DATABASE'] ?? ':memory:',
                    'prefix' => '',
                    'foreign_key_constraints' => true,
                ]);
            }
        });
    }

    /**
     * Hook after database refresh is complete
     */
    protected function afterRefreshingDatabase()
    {
        $this->artisan('thai-addresses:db-seed');
    }

    protected function defineDatabaseMigrations(): void
    {
        // migrations ของ package
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // migrations ของ workbench (เช่น users table)
        $this->loadMigrationsFrom(workbench_path('database/migrations'));
    }
}
