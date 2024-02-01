<?php

namespace Bicycle\Modules\Domain\Reservation;

use Bicycle\Modules\Domain\Reservation\Contracts\ReservationInterface;
use Bicycle\Modules\Domain\Reservation\Models\Schemas\Constants\ReservationConstants;
use Bicycle\Modules\Domain\Reservation\Services\ReservationService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ReservationServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.ReservationConstants::MIGRATION_ROUTE);
        $this->app->bind(ReservationInterface::class, ReservationService::class);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(ReservationConstants::PREFIX)
            ->namespace(ReservationConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.ReservationConstants::API_ROUTE);
    }
}
