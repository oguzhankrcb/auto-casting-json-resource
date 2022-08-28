<?php

namespace Tests\Unit;

use Brick\Money\Context\CustomContext;
use Brick\Money\Money;
use Illuminate\Support\Facades\Route;
use Tests\Models\BasicModel;
use Tests\Resources\TestResource;
use Tests\TestCase;

class AutoCastingJsonResourceTest extends TestCase
{
    /**
     * @test
     *
     * @see \Oguzhankrcb\AutoCastingJsonResource\AutoCastingJsonResource::isValueIsKnownTypeAndInCastings()
     */
    public function it_must_cast_known_types()
    {
        $user = (new BasicModel([
            'id' => 1,
            'price' => 15000,
        ]));

        Route::get('test-route', static fn () => TestResource::make($user));

        $response = $this->getJson('test-route');

        $response->assertOk()
            ->assertJson([
                'data' => [
                    'id' => 1,
                    'price' => 150,
                ],
            ]);
    }

    /**
     * @test
     *
     * @see \Oguzhankrcb\AutoCastingJsonResource\AutoCastingJsonResource::isValueIsObjectAndInCastings()
     */
    public function it_must_cast_object_type_values()
    {
        $user = (new BasicModel([
            'id' => 1,
            'price' => Money::ofMinor(
                minorAmount: 15000,
                currency: 'TRY',
                context: new CustomContext(2)
            ),
        ]));

        Route::get('test-route', static fn () => TestResource::make($user));

        $response = $this->getJson('test-route');

        $response->assertOk()
            ->assertJson([
                'data' => [
                    'id' => 1,
                    'price' => 7500,
                ],
            ]);
    }

    /**
     * @test
     *
     * @see \Oguzhankrcb\AutoCastingJsonResource\AutoCastingJsonResource::isKeyExcluded()
     */
    public function it_must_exclude_columns_in_excluded_columns_array()
    {
        $user = (new BasicModel([
            'id' => 1000,
            'price' => 15000,
        ]));

        Route::get('test-route', static fn () => TestResource::make($user));

        $response = $this->getJson('test-route');

        $response->assertOk()
            ->assertJson([
                'data' => [
                    'id' => 1000,
                    'price' => 150,
                ],
            ]);
    }
}
