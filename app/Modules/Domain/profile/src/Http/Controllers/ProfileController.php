<?php

namespace App\Modules\Domain\profile\src\Http\Controllers;

use Bicycle\Modules\Domain\Profile\Contracts\ProfileInterface;
use Illuminate\Http\JsonResponse;

class ProfileController
{
    /**
     * @param ProfileInterface $profileinterface
     */
    public function __construct(public ProfileInterface $profileinterface)
    {
        $this->profileinterface = $profileinterface;
    }

    /**
     * @return JsonResponse
     */
    public function profile(): JsonResponse
    {
        return $this->profileinterface->profile();
    }
}
