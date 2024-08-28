<?php

namespace Bicycle\Modules\Domain\Bicycle\Tests\Feature;

use Bicycle\Modules\Domain\Bicycle\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BicycleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function setUp(): void
    {

        parent::setUp();
    }

    /**
     * @test
     */
    public function a_user_can_be_see_the_bicycle_list(): void
    {
        $response = $this->actingAs($this->user, 'api')->json('GET', '/api/v1/bicycle', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $this->token",
            ]
        ]);

        $response->assertStatus(ResponseAlias::HTTP_OK);
    }

    /**
     * @test
     */
    public function unauthenticated_user_cannot_see_the_bicycle_list(): void
    {
        $response = $this->json('GET', '/api/v1/bicycle', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $this->token",
            ]
        ]);

        $response->assertUnauthorized();
    }
}
