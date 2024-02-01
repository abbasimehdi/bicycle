<?php

namespace App\Modules\Domain\reservation\src\Patterns\Builder;

use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Reservation\Contracts\ActiveInterface;
use Bicycle\Modules\Domain\Reservation\Contracts\hasInventoryInterface;
use Bicycle\Modules\Domain\Reservation\Enums\ReservationStatusEnum;
use Illuminate\Database\Eloquent\Model;

class ReservationBuilder implements ActiveInterface, hasInventoryInterface
{
    protected Bicycle $bicycle;
    protected int $count;
    protected $startDate;
    protected $endDate;

    /**
     * @param Bicycle $bicycle
     * @param int $count
     */
    public function __construct(Bicycle $bicycle, int $count)
    {
        $this->bicycle = $bicycle;
        $this->count = $count;
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @return $this
     * @throws \Exception
     */
    public function hasInventoryInDate(string $startDate, string $endDate): static
    {
        $totalReserved = (int)$this->bicycle->reservations()
            ->whereNot('status', ReservationStatusEnum::CANCEL->value)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start', [$startDate, $endDate])
                    ->OrWhereBetween('end', [$startDate, $endDate]);
            })->sum('quantity');

        $overallInventory = max($this->bicycle->inventory - $totalReserved, 0);

        if ($overallInventory >= $this->count) {
            $this->startDate = $startDate;
            $this->endDate = $endDate;
            return $this;
        }

        return throw new \InvalidArgumentException("Doesn't have inventory", 404);
    }

    /**
     * @return Model
     */
    public function reservation(): Model
    {
        return $this->bicycle->reservations()->create([
            'user_id' => auth()->user()->id,
            'start' => $this->startDate,
            'end' => $this->endDate,
            'quantity' => $this->count,
            'status' => ReservationStatusEnum::PENDING->value,
        ]);
    }

    /**
     * @return ReservationBuilder|null
     */
    public function active(): null|static
    {
        return $this->bicycle->is_active ? $this : throw new \InvalidArgumentException('bicycle inactive', 404);
    }
}
