<?php

namespace Bicycle\Modules\Domain\Reservation\Contracts;

use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Illuminate\Http\JsonResponse;

interface ReservationInterface
{
    public function reservation(array $data, $id): JsonResponse;

    public function cancel(Reservation $reservation): JsonResponse;
}
