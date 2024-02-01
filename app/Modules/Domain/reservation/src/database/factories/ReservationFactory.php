<?php

namespace Bicycle\Modules\Domain\Reservation\database\factories;

use App\Models\User;
use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Reservation\Enums\ReservationStatusEnum;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reservation>
 */
class ReservationFactory extends Factory
{
    protected $model = Reservation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bicycle = Bicycle::query()->inRandomOrder()->first();

        $start = $this->faker->dateTimeBetween('-1 days', '+10 days');
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'bicycle_id' => $bicycle->id,
            'start' => $start,
            'end' => $this->faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s') . ' +2 days'),
            'status' => $this->randEnum(ReservationStatusEnum::class),
            'quantity' => rand(1, $bicycle->quantity),
        ];
    }

    protected function randEnum($enum)
    {
        $statuses = $enum::cases();
        $values = array_column($statuses, 'value');
        return $values[array_rand($values)];
    }
}
