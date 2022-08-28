<?php

namespace Tests;

use Oguzhankrcb\AutoCastingJsonResource\AutoCastingJsonResourceServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            AutoCastingJsonResourceServiceProvider::class,
        ];
    }
}
