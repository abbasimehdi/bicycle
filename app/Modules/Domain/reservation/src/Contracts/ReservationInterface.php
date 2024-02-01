<?php

namespace Bicycle\Modules\Domain\Reservation\Contracts;

use Illuminate\Http\JsonResponse;

interface ReservationInterface
{
    public function reservation(array $data, $id): JsonResponse;

    public function cancel(int $id): JsonResponse;
}
