<?php

namespace Bicycle\Modules\Domain\Authentication\Services;


use Bicycle\Modules\Domain\Authentication\Contracts\LoginInterface;
use Bicycle\Modules\Domain\Authentication\Contracts\LoginRepository;

class LoginService implements LoginInterface

{
    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function login(array $data): \Illuminate\Http\JsonResponse
    {
        return $this->loginRepository->login($data);
    }
}
