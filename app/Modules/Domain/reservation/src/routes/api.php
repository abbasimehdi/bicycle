<?php

use App\Models\User;
use Bicycle\Modules\Domain\Reservation\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {
    Route::post('bicycles/{bicycle}/reservation',
        [ReservationController::class, 'reservation']
    );

    Route::prefix('admin')->middleware('checkUserIsAdmin')
        ->group(function () {
            Route::patch(
                'reservations/{reservation}/cancel',
                [ReservationController::class, 'cancel']
            );
        });
});

Route::get('users/{user}', function (User $user) {
    dd($user);
});
