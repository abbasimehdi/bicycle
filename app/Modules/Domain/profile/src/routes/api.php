<?php

use App\Modules\Domain\profile\src\Http\Controllers\ProfileController;
use Bicycle\Modules\Domain\Profile\Models\Schemas\Constants\ProfileConstants;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {
    Route::get(ProfileConstants::PROFILE, [ProfileController::class, ProfileConstants::PROFILE]);
});
