<?php

namespace Bicycle\Modules\Domain\Authentication\Services;

use Bicycle\Modules\Domain\Authentication\Contracts\RegisterInterface;
use Bicycle\Modules\Domain\Authentication\Contracts\RegisterRepository;
use Illuminate\Http\JsonResponse;

class RegisterService implements RegisterInterface
{
    /**
     * @param RegisterRepository $registerRepository
     */
    public function __construct(public RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    public function register(array $data): \Illuminate\Http\JsonResponse
    {
        return $this->registerRepository->register($data);
    }
}
