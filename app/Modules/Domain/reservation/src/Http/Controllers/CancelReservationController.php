<?php

namespace Bicycle\Modules\Domain\Reservation\Http\Controllers;

use Illuminate\Http\JsonResponse;

class CancelReservationController
{
    public function __construct(public ReservationInterface $reservationInterface)
    {
        $this->reservationInterface = $reservationInterface;
    }
}
