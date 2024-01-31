<?php

use App\Modules\Domain\profile\src\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {
    Route::get('profile', [ProfileController::class, 'profile']);
});
