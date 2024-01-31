<?php

namespace Bicycle\Modules\Domain\Core\Http\Contracts;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

interface BaseRepositoryInterface
{
    public function all(): JsonResponse;

    public function paginate(Request $request, int $limit = 15): JsonResponse;

    public function getBy($col, $value, int $limit = 15): JsonResponse;

    public function create(array $data);

    public function find(int $id): JsonResponse;

    public function update(int $id, array $data): JsonResponse;

    public function delete(int $id): JsonResponse;

    public function exists(int $id): JsonResponse;
}
