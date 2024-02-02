<?php

namespace Bicycle\Modules\Domain\Bicycle\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class BicycleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
        $this->user = User::factory(1)->create(['password' => 123456])->first();
        $this->token = $this->user->createToken('test token')->accessToken;
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

        $response->assertStatus(200);
    }
}
