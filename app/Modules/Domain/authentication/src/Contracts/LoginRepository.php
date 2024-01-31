<?php

namespace Bicycle\Modules\Domain\Authentication\Contracts;

use App\Models\User;
use Bicycle\Modules\Domain\Core\Http\Contracts\BaseRepository;
use Bicycle\Modules\Domain\Core\Http\Resources\BaseListCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginRepository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function model(): mixed
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
                'token' => auth()->user()->createToken('API Token')->accessToken
            ]
        )))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @param array $data
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response|void
     */
    private function isAttempt(array $data)
    {
        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details.Please try again']);
        }
    }
}
