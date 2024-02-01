<?php

namespace Bicycle\Modules\Domain\Reservation\Patterns\Builder;

use Bicycle\Modules\Domain\Reservation\Contracts\CancelInterface;
use Bicycle\Modules\Domain\Reservation\Contracts\CheckCancelStatusInterface;
use Bicycle\Modules\Domain\Reservation\Enums\ReservationStatusEnum;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CancelReservationBuilder implements CancelInterface, CheckCancelStatusInterface
{
    protected Reservation $reservation;

    /**
     * @param Reservation $reservation
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * @return bool
     */
    public function cancel(): bool
    {
        return $this->reservation->update(['status' => ReservationStatusEnum::CANCEL->value]);
    }

    /**
     * @return $this|CancelReservationBuilder|null
     */
    public function checkStatus(): null|static
    {
        return $this->reservation->status == ReservationStatusEnum::PENDING->value ?
            $this : throw new \InvalidArgumentException(
                'bicycles is delivered',
                ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
    }
}
