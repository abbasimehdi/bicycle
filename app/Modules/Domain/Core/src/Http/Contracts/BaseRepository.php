<?php

namespace Bicycle\Modules\Domain\Core\Http\Contracts;

use Bicycle\Modules\Domain\Core\Models\Schemas\Constants\BaseConstants;
use Illuminate\Http\JsonResponse;

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
        return $this->model->orderBy('id', 'desc')->get();
    }

    /**
     * @param int|null $limit
     * @return mixed
     */
    public function paginate(int|null $limit = BaseConstants::LIMIT): JsonResponse
    {
        return $this->model->orderBy('id', 'desc')->paginate($limit);
    }

    /**
     * @param $col
     * @param $value
     * @param  int  $limit
     * @return mixed
     */
    public function getBy($col, $value, int $limit = BaseConstants::LIMIT): JsonResponse
    {
        return $this->model->where($col, $value)->limit($limit)->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
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

    /**
     * @param int $id
     * @param array $data
     * @return JsonResponse
     */
    public function update(int $id, array $data): JsonResponse
    {
        return $this->model->update($data);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        return $this->model->delete();

    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function exists(int $id): JsonResponse
    {
        return $this->model->where('id', $id)->exists();
    }
}
