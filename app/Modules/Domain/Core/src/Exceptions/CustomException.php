<?php

namespace Bicycle\Modules\Domain\Core\Exceptions;

use Bicycle\Modules\Domain\Core\Http\Resources\BaseListCollection;
use Bicycle\Modules\Domain\Core\Models\Schemas\Constants\BaseConstants;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CustomException extends Exception
{
    /**
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function message(string $message, int $statusCode): JsonResponse
    {
        return (new BaseListCollection(collect([BaseConstants::MESSAGE => $message])))
            ->response()
            ->setStatusCode($statusCode ?? ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
    }
}
