<?php

namespace Bicycle\Modules\Domain\Reservation\Tests\Feature;

use App\Models\User;
use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Reservation\Models\Schemas\Constants\ReservationConstants;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class reservationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh --seed');
        Artisan::call('passport:install');
        $this->password = "123456";
        $this->user = User::factory(1)->create(['password' => $this->password])->first();
        $this->bicycle = Bicycle::query()->inRandomOrder()->first();
        $this->token = $this->user->createToken('test token')->accessToken;
    }

    /**
     * @test
     */
    public function a_user_can_be_reserve_bicycle(): void
    {
        $response = $this->withHeader('Accept', "application/json")
            ->actingAs($this->user, 'api')
            ->json('POST', "/api/v1/bicycles/".$this->bicycle->id."/reservation" ,
                [
                    ReservationConstants::START_DATE => $this->faker->dateTime()->format('d-m-Y'),
                    ReservationConstants::END_DATE => $this->faker->dateTime()->format('d-m-Y'),
                    ReservationConstants::COUNT => ReservationConstants::BASE_LIMIT,
                ]
            );

        $response->assertStatus(ResponseAlias::HTTP_CREATED);
    }

    /**
     * @test
     */
    public function a_user_can_be_see_reserved_bicycle_validation(): void
    {
        $response = $this->withHeader('Accept', "application/json")
            ->actingAs($this->user, 'api')
            ->json('POST', "/api/v1/bicycles/".$this->bicycle->id."/reservation" ,
                [
                    ReservationConstants::COUNT => ReservationConstants::BASE_LIMIT,
                ]
            );

        $response->assertUnprocessable();
    }

    /**
     * @test
     * Assert that no validation errors are present...
     */
    public function validation_success_of_user_can_be_see_reserved_bicycle(): void
    {
        $response = $this->withHeader('Accept', "application/json")
            ->actingAs($this->user, 'api')
            ->json('POST', "/api/v1/bicycles/".$this->bicycle->id."/reservation" ,
                [
                    ReservationConstants::START_DATE => $this->faker->dateTime()->format('d-m-Y'),
                    ReservationConstants::END_DATE => $this->faker->dateTime()->format('d-m-Y'),
                    ReservationConstants::COUNT => ReservationConstants::BASE_LIMIT,
                ]
            );

        $response->assertValid();
    }
}
