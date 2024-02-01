<?php

namespace Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants;
class AuthConstants
{
    const API_ROUTE = '/routes/api.php';
    const PREFIX = 'api';
    const ROUTE_PREFIX = 'prefix';
    const MODEL = 'model';
    const AUTH = 'auth';
    const OPERATION = 'operation';
    const CONTROLLER_ROUTE = 'Selfofficename\Modules\Domain\Authentication\Http\Controllers';
    const MIGRATION_ROUTE = '/database/migrations';

    const STRING_REGEX = "/^[a-zA-Z]+$/u";
    const EMAIL_REGEX = "/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/";
    const REGISTER = 'register';
    const LOGIN = 'login';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const USERNAME = 'username';
    const TOKEN_NAMe = 'API Token';
    const ERROR_MESSAGE = 'error_message';
}
