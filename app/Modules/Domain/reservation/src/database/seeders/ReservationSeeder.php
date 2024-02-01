<?php

namespace Bicycle\Modules\Domain\Reservation\database\seeders;

use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::factory(10)->create();
    }
}
