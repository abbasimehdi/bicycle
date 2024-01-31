<?php

use Bicycle\Modules\Domain\Bicycle\Http\Controllers\BicycleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->namespace('Users')->group(function () {
    Route::get('bicycle', [BicycleController::class, 'index']);
});
