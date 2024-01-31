<?php

namespace Bicycle\Modules\Domain\Bicycle\Contracts;

use Illuminate\Http\JsonResponse;

interface BicycleInterface
{
    public function all(int $limit): JsonResponse;
}
