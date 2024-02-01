<?php

namespace Bicycle\Modules\Domain\Reservation\Resources;

use Bicycle\Modules\Domain\Reservation\Enums\ReservationStatusEnum;
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
            'status' => $request['status'] ?? true,
            'data' => [
                'id' => $this->id,
                "bicycle" => $this->bicycle?->title,
                "quantity" => $this->quantity,
                "start" => $this->start,
                "end" => $this->end,
                "status" => ReservationStatusEnum::label($this->status),
                "created_at" => $this->created_at?->format('Y-m-d'),
            ],
            'message' => $request->all()['message'] ?? '',
        ];
    }
}
