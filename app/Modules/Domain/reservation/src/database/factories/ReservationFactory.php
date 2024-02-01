<?php

namespace Bicycle\Modules\Domain\Reservation\database\factories;

use App\Models\User;
use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Reservation\Enums\ReservationStatusEnum;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Bicycle\Modules\Domain\Reservation\Models\Schemas\Constants\ReservationConstants;
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
            ReservationConstants::USER_ID    => User::query()->inRandomOrder()->first()->id,
            ReservationConstants::BICYCLE_ID => $bicycle->id,
            ReservationConstants::START      => $start,
            ReservationConstants::END        => $this->faker->dateTimeBetween(
                $start,$start->format('Y-m-d H:i:s') . ' +2 days'
            ),
            ReservationConstants::STATUS     => $this->randEnum(ReservationStatusEnum::class),
            ReservationConstants::QUANTITY   => rand(1, $bicycle->quantity),
        ];
    }

    /**
     * @param $enum
     * @return mixed
     */
    protected function randEnum($enum): mixed
    {
        $statuses = $enum::cases();
        $values = array_column($statuses, ReservationConstants::VALUE);
        return $values[array_rand($values)];
    }
}
