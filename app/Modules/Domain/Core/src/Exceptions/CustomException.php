<?php

namespace Bicycle\Modules\Domain\Core\Exceptions;

use Bicycle\Modules\Domain\Core\Http\Resources\BaseListCollection;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CustomException extends Exception
{
    /**
     * @param $exception
     * @return JsonResponse
     */
    public function message($exception): JsonResponse
    {
        return (new BaseListCollection(collect(['message' => $exception->getMessage()])))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
    }
}
