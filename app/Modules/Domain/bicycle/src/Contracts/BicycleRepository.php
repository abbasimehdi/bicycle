<?php

namespace Bicycle\Modules\Domain\Bicycle\Contracts;

use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Core\Http\Contracts\BaseRepository;

class BicycleRepository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function model(): mixed
    {
        return Bicycle::class;
    }
}
