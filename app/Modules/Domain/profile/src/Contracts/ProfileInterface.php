<?php

namespace Bicycle\Modules\Domain\Profile\Contracts;

use Illuminate\Http\JsonResponse;

interface ProfileInterface
{
    public function profile(): JsonResponse;
}
