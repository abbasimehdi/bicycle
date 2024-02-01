<?php

namespace Bicycle\Modules\Domain\Core\Http\Contracts;

use Bicycle\Modules\Domain\Core\Models\Schemas\Constants\BaseConstants;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @return mixed
     */
    abstract public function model(): mixed;

    protected mixed $model;

    public function __construct()
    {
        $this->model = app($this->model());
    }

    /**
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return response()->json($this->model->orderBy('id', 'desc')->get());
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function paginate(int $limit = BaseConstants::LIMIT): JsonResponse
    {
        return response()->json($this->model->orderBy('id', 'desc')->paginate($limit));
    }

    /**
     * @param $col
     * @param $value
     * @param  int  $limit
     * @return mixed
     */
    public function getBy($col, $value, int $limit = BaseConstants::LIMIT): JsonResponse
    {
        return response()->json($this->model->where($col, $value)->limit($limit)->get());
    }

    /**
     * @param  array  $data
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     */
    public function find(int $id): JsonResponse
    {
        return $this->model->find($id);
    }

    public function update(int $id, array $data): JsonResponse
    {
        return response()->json($this->model->update($data));
    }


    public function delete(int $id): JsonResponse
    {
        return response()->json($this->model->delete());

    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function exists(int $id): JsonResponse
    {
        return response()->json($this->model->where('id', $id)->exists(), ResponseAlias::HTTP_OK);
    }
}
