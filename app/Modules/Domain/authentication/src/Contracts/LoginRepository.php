<?php

namespace Bicycle\Modules\Domain\Authentication\Contracts;

use App\Models\User;
use Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;
use Bicycle\Modules\Domain\Core\Http\Contracts\BaseRepository;
use Bicycle\Modules\Domain\Core\Http\Resources\BaseListCollection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginRepository extends BaseRepository
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
    public function login($data): JsonResponse
    {
        $this->isAttempt($data);


        return (new BaseListCollection(collect(
            [
                'token' => auth()->user()->createToken(AuthConstants::TOKEN_NAMe)->accessToken
            ]
        )))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @param array $data
     * @return void
     */
    private function isAttempt(array $data): void
    {
        if (!auth()->attempt($data)) {
            response([AuthConstants::ERROR_MESSAGE => trans('text.incorrect_detail')]);
        }
    }
}
