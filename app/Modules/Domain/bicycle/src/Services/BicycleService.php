<?php

namespace Bicycle\Modules\Domain\Bicycle\Services;

use Bicycle\Modules\Domain\Bicycle\Contracts\BicycleInterface;
use Bicycle\Modules\Domain\Bicycle\Contracts\BicycleRepository;
use Bicycle\Modules\Domain\Core\Http\Resources\BaseListCollection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BicycleService implements BicycleInterface

{
    public function __construct(public BicycleRepository $bicycleRepository)
    {
        $this->bicycleRepository = $bicycleRepository;
    }

    /**
     * @param int $limit
     * @return JsonResponse
     */
    public function all(int $limit): JsonResponse
    {
        return (new BaseListCollection(collect([$this->bicycleRepository->paginate($limit)])))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

}
