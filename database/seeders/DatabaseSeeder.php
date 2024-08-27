<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Domain\bicycle\database\seeders\BicycleSeeder;
use App\Modules\Domain\reservation\database\seeders\ReservationSeeder;
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
