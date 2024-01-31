<?php

namespace Selfofficename\Modules\Domain\Authentication\Services;

use Selfofficename\Modules\Domain\Authentication\Contracts\RegisterInterface;
use Selfofficename\Modules\Domain\Authentication\Contracts\RegisterRepository;

class RegisterService implements RegisterInterface

{
    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function register(array $data): \Illuminate\Http\JsonResponse
    {
        return $this->registerRepository->register($data);
    }
}
