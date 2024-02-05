<?php

namespace Bicycle\Modules\Domain\Profile;

use Bicycle\Modules\Domain\Profile\Contracts\ProfileInterface;
use Bicycle\Modules\Domain\Profile\Models\Schemas\Constants\ProfileConstants;
use Bicycle\Modules\Domain\Profile\Services\ProfileService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ProfileServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.ProfileConstants::MIGRATION_ROUTE);
        $this->app->bind(ProfileInterface::class, ProfileService::class);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(ProfileConstants::PREFIX)
            ->namespace(ProfileConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.ProfileConstants::API_ROUTE);
    }
}
