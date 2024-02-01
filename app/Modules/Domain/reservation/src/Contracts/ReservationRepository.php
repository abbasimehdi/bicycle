<?php

namespace Bicycle\Modules\Domain\Reservation\Contracts;

use App\Modules\Domain\reservation\src\Patterns\Builder\ReservationBuilder;
use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Core\Http\Contracts\BaseRepository;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Bicycle\Modules\Domain\Reservation\Patterns\Builder\CancelReservationBuilder;
use Bicycle\Modules\Domain\Reservation\Resources\ReservationResource;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
     * @param $id
     * @return JsonResponse
     * @throws \Exception
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
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @param int $id
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

    /**
     * @param $id
     * @return Model|Collection|Builder|array|null
     */
    public function findBicycle($id): Model|Collection|Builder|array|null
    {
        return Bicycle::query()->find($id);
    }
}
