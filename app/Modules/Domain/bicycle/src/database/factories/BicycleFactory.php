<?php

namespace Bicycle\Modules\Domain\Bicycle\database\factories;

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
            'title' => $this->faker->text(10),
            'inventory' => rand(1,20),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
