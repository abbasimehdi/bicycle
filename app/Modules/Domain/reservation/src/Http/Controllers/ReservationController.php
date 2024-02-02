<?php

namespace Bicycle\Modules\Domain\Reservation\Http\Controllers;

use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Core\Exceptions\CustomException;
use Bicycle\Modules\Domain\Reservation\Contracts\ReservationInterface;
use Bicycle\Modules\Domain\Reservation\Http\Requests\ReservationRequest;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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
        try {
            return $this->reservationInterface->reservation($request->all(),
                 Bicycle::query()->findOrFail($id));
        } catch (ModelNotFoundException $exception) {
            return (new CustomException())->message($exception->getMessage(), ResponseAlias::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function cancel(int $id): JsonResponse
    {
        try {
            return $this->reservationInterface->cancel(Reservation::query()->findOrFail($id));
        } catch (ModelNotFoundException $exception) {
            return (new CustomException())->message($exception->getMessage(), ResponseAlias::HTTP_NOT_FOUND);
        }
    }
}
