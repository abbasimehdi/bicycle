<?php

use Bicycle\Modules\Domain\Authentication\Http\Controllers\LoginController;
use Bicycle\Modules\Domain\Authentication\Http\Controllers\RegisterController;

Route::group(['prefix' => 'auth'], function($router) {
    $router->post('/register', [RegisterController::class, 'register']);
    $router->post('/login', [LoginController::class, 'login']);
});
