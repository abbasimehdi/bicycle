<?php

namespace Bicycle\Modules\Domain\Reservation\Tests\Unit;

use App\Models\User;
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
}
