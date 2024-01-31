<?php

namespace Bicycle\Modules\Domain\Authentication\Contracts;

use App\Models\User;
use Bicycle\Modules\Domain\Core\Http\Contracts\BaseRepository;
use Bicycle\Modules\Domain\Core\Http\Resources\BaseListCollection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RegisterRepository extends BaseRepository
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
    public function register($data): JsonResponse
    {
        $user = User::query()->create([
            'name'     => $data['name'],
            'email'     => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $token = $user->createToken('API Token')->accessToken;

        return (new BaseListCollection(collect(['token' => $token])))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_CREATED);
    }
}
