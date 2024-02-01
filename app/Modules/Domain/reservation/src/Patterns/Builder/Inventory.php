<?php

namespace App\Modules\Domain\reservation\src\Patterns\Builder;

use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Reservation\Contracts\InventoryInterface;
use Bicycle\Modules\Domain\Reservation\Enums\ReservationStatusEnum;

class Inventory implements InventoryInterface
{
    /**
     * @param Bicycle $bicycle
     */
    public function __construct(protected Bicycle $bicycle)
    {
        $this->bicycle = $bicycle;
    }

    /**
     * @param string $date
     * @return mixed
     */
    public function Inventory(string $date): mixed
    {
        return max(
            $this->bicycle->inventory -
            (int) $this->bicycle
                ->reservations()
                ->whereNot('status', ReservationStatusEnum::CANCEL->value)
                ->where(function ($query) use ($date) {
                    $query->whereDate('start', '<=', $date)
                        ->whereDate('end', '>=',$date);
                })->sum('quantity'),
            0);
    }
}
