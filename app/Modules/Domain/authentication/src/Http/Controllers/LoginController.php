<?php

namespace Bicycle\Modules\Domain\Authentication\Http\Controllers;

use App\Http\Controllers\Controller;
use Bicycle\Modules\Domain\Authentication\Contracts\LoginInterface;
use Illuminate\Http\JsonResponse;
use Bicycle\Modules\Domain\Authentication\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    /**
     * @param LoginInterface $loginInterface
     */
    public function __construct(
        LoginInterface $loginInterface
    ) {
        $this->loginInterface = $loginInterface;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->loginInterface->login($request->all());
    }
}
