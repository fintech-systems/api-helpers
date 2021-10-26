<?php

namespace FintechSystems\LaravelApiHelpers;

use FintechSystems\LaravelApiHelpers\Commands\LaravelApiHelpersCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelApiHelpersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-api-helpers')
            ->hasViews()
            ->hasMigration('create_laravel-api-helpers_table')
            ->hasCommand(LaravelApiHelpersCommand::class);
    }
}
