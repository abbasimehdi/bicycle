<?php

namespace Bicycle\Modules\Domain\Bicycle\Tests\Unit;

use App\Models\User;
use App\Modules\Domain\bicycle\src\Models\Schemas\Constants\BicycleConstants;
use Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;
use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
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
        $this->bicycle = Bicycle::factory()->create();
        $this->token = $this->user->createToken('test token')->accessToken;
    }

    /**
     * @test
     */
    public function a_bicycle_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('bicycles',
                [
                    BicycleConstants::TITLE,
                    BicycleConstants::INVENTORY,
                    BicycleConstants::IS_ACTIVE,
                ]));
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

    /**
     * @test
     */
    public function check_bicycle_model_exists()
    {
        $this->assertModelExists($this->bicycle);
    }

    /**
     * @test
     */
    public function check_bicycle_model_does_not_exists()
    {
        $this->bicycle->delete();

        $this->assertModelMissing($this->bicycle);
    }
}
