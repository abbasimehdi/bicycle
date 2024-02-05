<?php

namespace Bicycle\Modules\Domain\Reservation\Contracts;

use App\Modules\Domain\reservation\src\Patterns\Builder\ReservationBuilder;
use Bicycle\Modules\Domain\Core\Http\Contracts\BaseRepository;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Bicycle\Modules\Domain\Reservation\Patterns\Builder\CancelReservationBuilder;
use Bicycle\Modules\Domain\Reservation\Resources\ReservationResource;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ReservationRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Reservation::class;
    }

    /**
     * @param array $data
     * @param $bicycle
     * @return JsonResponse
     * @throws Exception
     */
    public function reservation(array $data, $bicycle): JsonResponse
    {
        return (new ReservationResource(
            (new ReservationBuilder($bicycle, $data['count']))
                ->active()
                ->hasInventoryInDate(
                    Carbon::createFromDate($data['startDate'])->startOfDay(),
                    Carbon::createFromDate($data['endDate'])->endOfDay()
                )
                ->reservation()
        ))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_CREATED);
    }

    /**
     * @param $reservation
     * @return JsonResponse
     */
    public function cancel($reservation): JsonResponse
    {
        return (new ReservationResource(
            (new CancelReservationBuilder(
                $reservation
            ))->checkStatus()->cancel()
        ))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }
}
