<?php

namespace Bicycle\Modules\Domain\Authentication\Contracts;

use Illuminate\Http\JsonResponse;

interface LoginInterface
{
    public function login(array $data): JsonResponse;
}
