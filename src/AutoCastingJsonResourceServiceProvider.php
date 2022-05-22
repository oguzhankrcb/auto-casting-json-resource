<?php

namespace Oguzhankrcb\AutoCastingJsonResource;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Oguzhankrcb\AutoCastingJsonResource\Commands\AutoCastingJsonResourceCommand;

class AutoCastingJsonResourceServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('auto-casting-json-resource');
    }
}
