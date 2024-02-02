<?php

namespace Bicycle\Modules\Domain\Core\Exceptions;

use Bicycle\Modules\Domain\Core\Http\Resources\BaseListCollection;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CustomException extends Exception
{
    /**
     * @param $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function message($message, int $statusCode): JsonResponse
    {
        return (new BaseListCollection(collect(['message' => $message])))
            ->response()
            ->setStatusCode($statusCode ?? ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
    }
}
