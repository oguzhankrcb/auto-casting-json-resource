<?php

namespace Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Oguzhankrcb\AutoCastingJsonResource\AutoCastingJsonResourceServiceProvider;

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
