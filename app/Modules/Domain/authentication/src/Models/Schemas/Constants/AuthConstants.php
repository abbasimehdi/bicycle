<?php

namespace Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants;
class AuthConstants
{
    const API_ROUTE = '/routes/api.php';
    const PREFIX = 'api';
    const MODEL = 'model';
    const OPERATION = 'operation';
    const CONTROLLER_ROUTE = 'Selfofficename\Modules\Domain\Authentication\Http\Controllers';
    const MIGRATION_ROUTE = '/database/migrations';

    const STRING_REGEX = "/^[a-zA-Z]+$/u";
    const EMAIL_REGEX = "/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/";
}
