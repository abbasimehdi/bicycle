<?php

namespace Bicycle\Modules\Domain\Reservation\Services;

use Bicycle\Modules\Domain\Reservation\Contracts\ReservationInterface;
use Bicycle\Modules\Domain\Reservation\Contracts\ReservationRepository;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Exception;
use Illuminate\Http\JsonResponse;

class ReservationService implements ReservationInterface
{
    /**
     * @param ReservationRepository $reservationRepository
     */
    public function __construct(public ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * @param array $data
     * @param $id
     * @return JsonResponse
     * @throws Exception
     */
    public function reservation(array $data, $bicycle): JsonResponse
    {
        return $this->reservationRepository->reservation($data, $bicycle);
    }

    /**
     * @param array $reservation
     * @return JsonResponse
     */
    public function cancel(Reservation $reservation): JsonResponse
    {
        return $this->reservationRepository->cancel($reservation);
    }
}
