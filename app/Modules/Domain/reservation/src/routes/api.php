<?php

use App\Models\User;
use Bicycle\Modules\Domain\Core\Models\Schemas\Constants\BaseConstants;
use Bicycle\Modules\Domain\Reservation\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {
    Route::post('bicycles/{bicycle}/reservation',
        [ReservationController::class, 'reservation']
    );

    Route::prefix(BaseConstants::ADMIN)->middleware('checkUserIsAdmin')
        ->group(function () {
            Route::patch(
                'reservations/{reservation}/cancel',
                [ReservationController::class, 'cancel']
            );
        });
});
