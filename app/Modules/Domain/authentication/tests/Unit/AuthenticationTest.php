<?php

namespace Bicycle\Modules\Domain\Authentication\Tests\Unit;

use App\Models\User;
use Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;
use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AuthenticationTest extends TestCase
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
    }

    /**
     * @test
     */
    public function a_user_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users',
                [
                    AuthConstants::NAME,
                    AuthConstants::EMAIL,
                    AuthConstants::USERNAME,
                    AuthConstants::PASSWORD,
                ]));
    }

    /** @test */
    public function it_has_many_reservation()
    {
        $user1 = User::factory()->create();
        $bicycle = Bicycle::factory()->create();
        $reservation = Reservation::factory()->create([
            'user_id' => $user1->id,
            'bicycle_id' => $bicycle->id,
        ]);

        $bicycleReservations = $bicycle->reservations;

        $this->assertInstanceOf(Reservation::class, $bicycleReservations->first());
        $this->assertEquals($reservation->id, $bicycleReservations->first()->id);
    }
}
