<?php

namespace Bicycle\Modules\Domain\Authentication\Contracts;

use App\Models\User;
use Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;
use Bicycle\Modules\Domain\Core\Http\Contracts\BaseRepository;
use Bicycle\Modules\Domain\Core\Http\Resources\BaseListCollection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RegisterRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function register($data): JsonResponse
    {
        return (new BaseListCollection(collect([
            AuthConstants::TOKEN => $this->create($data)->createToken(AuthConstants::API_TOEN)->accessToken]))
        )
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_CREATED);
    }
}
