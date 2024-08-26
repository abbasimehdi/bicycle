<?php

namespace Bicycle\Modules\Domain\Authentication;

use Bicycle\Modules\Domain\Authentication\Contracts\LoginInterface;
use Bicycle\Modules\Domain\Authentication\Contracts\RegisterInterface;
use Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;
use Bicycle\Modules\Domain\Authentication\Services\LoginService;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Bicycle\Modules\Domain\Authentication\Services\RegisterService;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.AuthConstants::MIGRATION_ROUTE);
        $this->loadTranslationsFrom( __DIR__, AuthConstants::TRANSLATION);
        $this->loadTranslationsFrom(__DIR__ . AuthConstants::TRANSLATION, 'auth_lang');
//        samp;e call: <label>{{ __('package_lang::subs/fields.name_of_subs') }}</label>
        $this->app->bind(RegisterInterface::class, RegisterService::class);
        $this->app->bind(LoginInterface::class, LoginService::class);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(AuthConstants::PREFIX)
            ->namespace(AuthConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.AuthConstants::API_ROUTE);
    }
}
