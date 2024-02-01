<?php

namespace App\Modules\Domain\profile\src\Http\Controllers;

use Bicycle\Modules\Domain\Profile\Contracts\ProfileInterface;
use Illuminate\Http\JsonResponse;

class ProfileController
{
    /**
     * @param ProfileInterface $profileInterface
     */
    public function __construct(public ProfileInterface $profileInterface)
    {
        $this->profileInterface = $profileInterface;
    }

    /**
     * @return JsonResponse
     */
    public function profile(): JsonResponse
    {
        return $this->profileInterface->profile();
    }
}
