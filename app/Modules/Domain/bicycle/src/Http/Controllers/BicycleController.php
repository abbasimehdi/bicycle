<?php

namespace Bicycle\Modules\Domain\Bicycle\Http\Controllers;

use Bicycle\Modules\Domain\Bicycle\Contracts\BicycleInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BicycleController
{
    /**
     * @param BicycleInterface $bicycleInterface
     */
    public function __construct(public BicycleInterface $bicycleInterface)
    {
        $this->bicycleInterface = $bicycleInterface;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->bicycleInterface->all($request->query('limit'));
    }
}
