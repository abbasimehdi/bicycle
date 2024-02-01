<?php

namespace Bicycle\Modules\Domain\Authentication\Services;

use Bicycle\Modules\Domain\Authentication\Contracts\LoginInterface;
use Bicycle\Modules\Domain\Authentication\Contracts\LoginRepository;
use Illuminate\Http\JsonResponse;

class LoginService implements LoginInterface

{
    /**
     * @param LoginRepository $loginRepository
     */
    public function __construct(public LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    public function login(array $data): \Illuminate\Http\JsonResponse
    {
        return $this->loginRepository->login($data);
    }
}
