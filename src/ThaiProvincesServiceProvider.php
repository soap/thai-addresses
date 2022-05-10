<?php

namespace Soap\ThaiProvinces;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Soap\ThaiProvinces\Commands\ThaiProvincesInstallCommand;

class ThaiProvincesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('thai-provinces')
            ->hasConfigFile()
            //->hasViews()
            
            ->hasMigrations([
                'create_thai_geographies_table',
                'create_thai_provinces_table',
                'create_thai_amphures_table'
            ])
            ->hasCommands([
                ThaiProvincesInstallCommand::class
            ]);
    }

    public function registeringPackage()
    {
        $this->app->bind('thai-provinces', function ($app) {
            return new ThaiProvinces();
        });
    }
}
