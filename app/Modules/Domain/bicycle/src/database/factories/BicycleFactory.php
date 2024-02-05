<?php

namespace Bicycle\Modules\Domain\Bicycle\database\factories;

use App\Modules\Domain\bicycle\src\Models\Schemas\Constants\BicycleConstants;
use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Bicycle>
 */
class BicycleFactory extends Factory
{
    protected $model = Bicycle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            BicycleConstants::TITLE     => $this->faker->text(10),
            BicycleConstants::INVENTORY => rand(1,20),
            BicycleConstants::IS_ACTIVE => $this->faker->boolean(),
        ];
    }
}
