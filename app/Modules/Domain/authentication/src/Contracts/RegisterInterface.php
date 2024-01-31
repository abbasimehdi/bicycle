<?php

namespace Bicycle\Modules\Domain\Authentication\Contracts;

use Illuminate\Http\JsonResponse;

interface RegisterInterface
{
    public function register(array $data): JsonResponse;
}
