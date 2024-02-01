<?php

namespace Bicycle\Modules\Domain\Bicycle;

use App\Modules\Domain\bicycle\src\Models\Schemas\Constants\BicycleConstants;
use Bicycle\Modules\Domain\Bicycle\Contracts\BicycleInterface;
use Bicycle\Modules\Domain\Bicycle\Services\BicycleService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BicycleServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.BicycleConstants::MIGRATION_ROUTE);
        $this->app->bind(BicycleInterface::class, BicycleService::class);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(BicycleConstants::PREFIX)
            ->namespace(BicycleConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.BicycleConstants::API_ROUTE);
    }
}
