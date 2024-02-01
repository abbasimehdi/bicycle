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
    public function message(object $exception, int $statusCode): JsonResponse
    {
        return (new BaseListCollection(collect(['message' => $exception->getMessage()])))
            ->response()
            ->setStatusCode($statusCode ?? ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
    }
}
