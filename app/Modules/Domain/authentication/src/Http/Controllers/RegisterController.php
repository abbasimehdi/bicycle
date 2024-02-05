<?php

namespace Bicycle\Modules\Domain\Authentication\Http\Controllers;

use App\Http\Controllers\Controller;
use Bicycle\Modules\Domain\Authentication\Contracts\RegisterInterface;
use Bicycle\Modules\Domain\Authentication\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * @param RegisterInterface $registerInterface
     */
    public function __construct(
        public RegisterInterface $registerInterface
    ) {
        $this->registerInterface = $registerInterface;
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->registerInterface->register(($request->all()));
    }
}
