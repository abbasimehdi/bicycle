<?php

namespace Bicycle\Modules\Domain\Reservation\Http\Controllers;

use Bicycle\Modules\Domain\Reservation\Contracts\ReservationInterface;
use Bicycle\Modules\Domain\Reservation\Http\Requests\ReservationRequest;
use Illuminate\Http\JsonResponse;

class ReservationController
{
    /**
     * @param ReservationInterface $reservationInterface
     */
    public function __construct(public ReservationInterface $reservationInterface)
    {
        $this->reservationInterface = $reservationInterface;
    }

    /**
     * @param ReservationRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function reservation(ReservationRequest $request, $id): JsonResponse
    {
        return $this->reservationInterface->reservation($request->all(), $id);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function cancel(int $id): JsonResponse
    {
        return $this->reservationInterface->cancel($id);
    }
}
