<?php

namespace Soap\ThaiAddresses;

use Soap\ThaiAddresses\Commands\ThaiAddressesInstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ThaiAddressesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('thai-addresses')
            ->hasConfigFile()
            //->hasViews()

            ->hasMigrations([
                'create_thai_geographies_table',
                'create_thai_provinces_table',
                'create_thai_districts_table',
                'create_thai_subdistricts_table',
                'create_addresses_table'
            ])
            ->hasCommands([
                ThaiAddressesInstallCommand::class,
            ]);
    }

    public function registeringPackage()
    {
        $this->app->bind('thai-addresses', function ($app) {
            return new ThaiAddresses();
        });
    }
}
