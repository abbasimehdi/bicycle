<?php

namespace Bicycle\Modules\Domain\Reservation\Contracts;

interface hasInventoryInterface
{
    public function hasInventoryInDate(string $startDate, string $endDate);
}
