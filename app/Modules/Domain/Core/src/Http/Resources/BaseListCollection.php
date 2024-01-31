<?php

namespace Bicycle\Modules\Domain\Core\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseListCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'status' => $request['status'] ?? true,
            'data' => $this->collection->toArray(),
            'message' => $request->all()['message'] ?? '',
        ];
    }
}
