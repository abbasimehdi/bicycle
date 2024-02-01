<?php

namespace Bicycle\Modules\Domain\Reservation\Resources;

use Bicycle\Modules\Domain\Reservation\Enums\ReservationStatusEnum;
use Bicycle\Modules\Domain\Reservation\Models\Schemas\Constants\ReservationConstants;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            ReservationConstants::STATUS         => $request['status'] ?? true,
            ReservationConstants::DATA => [
                ReservationConstants::ID         => $this->id,
                ReservationConstants::BICYCLE    => $this->bicycle?->title,
                ReservationConstants::QUANTITY   => $this->quantity,
                ReservationConstants::START      => $this->start,
                ReservationConstants::END        => $this->end,
                ReservationConstants::STATUS     => ReservationStatusEnum::label($this->status),
                ReservationConstants::CREATED_AT => $this->created_at?->format('Y-m-d'),
            ],
            ReservationConstants::MESSAGE        => $request->all()['message'] ?? '',
        ];
    }
}
