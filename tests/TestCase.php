<?php

namespace Soap\ThaiAddresses\Tests;

use Illuminate\Config\Repository;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;

use function Orchestra\Testbench\workbench_path;

use Soap\ThaiAddresses\Tests\Models\User;
use Soap\ThaiAddresses\ThaiAddressesServiceProvider;

class TestCase extends Orchestra
{
    use RefreshDatabase; // เปลี่ยนจาก DatabaseMigrations
    use WithWorkbench;

    protected function setUp(): void
    {
        // Force load environment variables
        $this->loadEnvironmentVariables();

        parent::setUp();

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            if (Str::startsWith($modelName, 'Workbench\\App\\Models\\')) {
                return 'Workbench\\Database\\Factories\\'.class_basename($modelName).'Factory';
            }

            return 'Soap\\ThaiAddresses\\Tests\\Database\\Factories\\'.class_basename($modelName).'Factory';
        });

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    protected function loadEnvironmentVariables()
    {
        // ลองโหลด .env.testing ก่อน
        $envTestingPath = __DIR__.'/../.env.testing';
        if (file_exists($envTestingPath)) {
            $this->loadEnvFile($envTestingPath);
        }

        // ถ้าไม่มี ลองโหลด .env
        $envPath = __DIR__.'/../.env';
        if (file_exists($envPath)) {
            $this->loadEnvFile($envPath);
        }

        // Set default values หาก environment variables ไม่มี
        $this->setDefaultEnvironmentVariables();
    }

    protected function loadEnvFile($path)
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue; // Skip comments
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

    protected function setDefaultEnvironmentVariables()
    {
        $defaults = [
            'APP_ENV' => 'testing',
            'DB_CONNECTION' => 'mysql',
            'DB_HOST' => '127.0.0.1',
            'DB_PORT' => '3306',
            'DB_DATABASE' => 'thai_addresses_package_test',
            'DB_USERNAME' => 'root',
            'DB_PASSWORD' => '', // Default empty password for local
        ];

        foreach ($defaults as $key => $value) {
            if (! isset($_ENV[$key]) && ! isset($_SERVER[$key])) {
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
                putenv("$key=$value");
            }
        }
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

            // ใช้ MySQL เสมอ
            $config->set('database.default', 'mysql');

            $config->set('database.connections.mysql', [
                'driver' => 'mysql',
                'host' => $_ENV['DB_HOST'] ?? $_SERVER['DB_HOST'] ?? '127.0.0.1',
                'port' => $_ENV['DB_PORT'] ?? $_SERVER['DB_PORT'] ?? '3306',
                'database' => $_ENV['DB_DATABASE'] ?? $_SERVER['DB_DATABASE'] ?? 'thai_addresses_package_test',
                'username' => $_ENV['DB_USERNAME'] ?? $_SERVER['DB_USERNAME'] ?? 'root',
                'password' => $_ENV['DB_PASSWORD'] ?? $_SERVER['DB_PASSWORD'] ?? '',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => false,
                'engine' => null,
            ]);

            // Debug output
            if (app()->environment('testing')) {
                echo '=== MySQL Configuration ==='.PHP_EOL;
                echo 'Host: '.$config->get('database.connections.mysql.host').PHP_EOL;
                echo 'Database: '.$config->get('database.connections.mysql.database').PHP_EOL;
                echo 'Username: '.$config->get('database.connections.mysql.username').PHP_EOL;
                echo 'Password: '.($config->get('database.connections.mysql.password') ? '[SET]' : '[EMPTY]').PHP_EOL;
            }
        });
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(workbench_path('database/migrations'));
    }
}
