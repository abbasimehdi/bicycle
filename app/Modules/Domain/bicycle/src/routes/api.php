<?php

use App\Modules\Domain\bicycle\src\Models\Schemas\Constants\BicycleConstants;
use Bicycle\Modules\Domain\Bicycle\Http\Controllers\BicycleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->namespace('Users')->group(function () {
    Route::get(BicycleConstants::BICYCLE, [BicycleController::class, BicycleConstants::INDEX]);
});
