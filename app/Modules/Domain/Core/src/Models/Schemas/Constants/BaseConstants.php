<?php

namespace Bicycle\Modules\Domain\Core\Models\Schemas\Constants;

class BaseConstants
{
    const DEFAULT_USER = 1;
    const LIMIT = 10;
    const MESSAGE = 'message';
    const STR_RANDOM = 10;
    const TOKEN = 'token';
    const ADMIN = 'admin';
    const BICYCLE_ID = 'bicycle_id';

    const ALL_SLUGS = [
        self::DEFAULT_USER,
        self::LIMIT,
        self::TOKEN,
        self::STR_RANDOM,
    ];
}
