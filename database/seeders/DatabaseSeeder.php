<?php

namespace Database\Seeders;

use App\Models\User;
use Bicycle\Modules\Domain\Bicycle\database\seeders\BicycleSeeder;
use Bicycle\Modules\Domain\Reservation\database\seeders\ReservationSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->call(BicycleSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(RolesSeeder::class);
    }
}
