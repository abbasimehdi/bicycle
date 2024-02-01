<?php

namespace Bicycle\Modules\Domain\Bicycle\database\seeders;

use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Illuminate\Database\Seeder;

class BicycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bicycle::factory(20)->create();
    }
}
