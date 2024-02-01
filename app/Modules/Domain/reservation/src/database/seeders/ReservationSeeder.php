<?php

namespace Bicycle\Modules\Domain\Reservation\database\seeders;

use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Bicycle\Modules\Domain\Reservation\Models\Schemas\Constants\ReservationConstants;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::factory(ReservationConstants::FACTORY_LIMIT)->create();
    }
}
