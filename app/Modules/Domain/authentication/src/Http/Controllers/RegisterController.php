<?php

namespace Bicycle\Modules\Domain\Authentication\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Selfofficename\Modules\Domain\Authentication\Contracts\RegisterInterface;
use Selfofficename\Modules\Domain\Authentication\Http\Requests\RegisterRequest;
use Selfofficename\Modules\InfraStructure\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * @param RegisterInterface $registerInterface
     */
    public function __construct(
        RegisterInterface $registerInterface
    ) {
        $this->registerInterface = $registerInterface;
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        return $this->registerInterface->register(($request->all()));
    }
}
