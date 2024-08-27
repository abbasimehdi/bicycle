<?php

namespace App\Modules\Domain\bicycle\database\seeders;

use App\Modules\Domain\bicycle\src\Models\Schemas\Constants\BicycleConstants;
use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Illuminate\Database\Seeder;

class BicycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bicycle::factory(BicycleConstants::FACTORY_LIMIT)->create();
    }
}
