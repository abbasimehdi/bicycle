<?php

namespace App\Modules\Domain\profile\src\Contracts;

use App\Models\User;
use Bicycle\Modules\Domain\Core\Http\Contracts\BaseRepository;
use Bicycle\Modules\Domain\Core\Http\Resources\BaseListCollection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProfileRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * @return JsonResponse
     */
    public function profile(): JsonResponse
    {
        return (new BaseListCollection(collect(['profile' => \auth('api')->user()])))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }
}
