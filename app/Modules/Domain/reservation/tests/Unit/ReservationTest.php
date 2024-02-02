<?php

namespace Bicycle\Modules\Domain\Reservation\Tests\Unit;

use App\Models\User;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Bicycle\Modules\Domain\Reservation\Models\Schemas\Constants\ReservationConstants;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ReservationTest extends TestCase
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
        $this->reservations = Reservation::factory()->create();
        $this->token = $this->user->createToken('test token')->accessToken;
    }

    /**
     * @test
     */
    public function a_reservation_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('reservations',
                [
                    ReservationConstants::USER_ID,
                    ReservationConstants::BICYCLE_ID,
                    ReservationConstants::QUANTITY,
                    ReservationConstants::START,
                    ReservationConstants::END,
                    ReservationConstants::STATUS
                ]));
    }

    /**
     * @test
     */
    public function check_reservation_model_exists()
    {
        $this->assertModelExists($this->reservations);
    }

    /**
     * @test
     */
    public function check_reservation_model_does_not_exists()
    {
        $this->reservations->delete();

        $this->assertModelMissing($this->reservations);
    }
}
