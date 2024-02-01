<?php

namespace App\Modules\Domain\reservation\src\Patterns\Builder;

use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Reservation\Contracts\InventoryInterface;
use Bicycle\Modules\Domain\Reservation\Enums\ReservationStatusEnum;

class Inventory implements InventoryInterface
{
    protected Bicycle $bicycle;

    /**
     * @param Bicycle $bicycle
     */
    public function __construct(Bicycle $bicycle)
    {
        $this->bicycle = $bicycle;
    }

    /**
     * @param string $date
     * @return mixed
     */
    public function Inventory(string $date): mixed
    {
        $inventory = $this->bicycle->inventory;
        $reservation =(int) $this->bicycle->reservations()
            ->whereNot('status', ReservationStatusEnum::CANCEL->value)
            ->where(function ($query) use ($date) {
                $query->whereDate('start', '<=', $date)
                ->whereDate('end', '>=',$date);
            })->sum('quantity');

        return max($inventory-$reservation, 0);
    }
}
