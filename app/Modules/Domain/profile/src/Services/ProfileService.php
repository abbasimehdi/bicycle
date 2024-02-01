<?php

namespace Bicycle\Modules\Domain\Profile\Services;

use App\Modules\Domain\profile\src\Contracts\ProfileRepository;
use Bicycle\Modules\Domain\Profile\Contracts\ProfileInterface;
use Illuminate\Http\JsonResponse;

class ProfileService implements ProfileInterface

{
    /**
     * @param ProfileRepository $profileRepository
     */
    public function __construct(
        public ProfileRepository $profileRepository
    ) {
        $this->profileRepository = $profileRepository;
    }

    /**
     * @return JsonResponse
     */
    public function profile(): JsonResponse
    {
        return $this->profileRepository->profile();
    }
}
