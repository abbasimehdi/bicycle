<?php

use Bicycle\Modules\Domain\Authentication\Http\Controllers\LoginController;
use Bicycle\Modules\Domain\Authentication\Http\Controllers\RegisterController;
use Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;
use Illuminate\Support\Facades\Route;

Route::group([AuthConstants::ROUTE_PREFIX => AuthConstants::AUTH], function($router) {
    $router->post(AuthConstants::REGISTER, [RegisterController::class, AuthConstants::REGISTER]);
    $router->post(AuthConstants::LOGIN, [LoginController::class, AuthConstants::LOGIN]);
});
