<?php

namespace Oguzhankrcb\AutoCastingJsonResource\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Oguzhankrcb\AutoCastingJsonResource\AutoCastingJsonResourceServiceProvider;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Oguzhankrcb\\AutoCastingJsonResource\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            AutoCastingJsonResourceServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_auto-casting-json-resource_table.php.stub';
        $migration->up();
        */
    }
}
