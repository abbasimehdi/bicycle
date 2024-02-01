<?php

namespace Bicycle\Modules\Domain\Reservation\Enums;

use InvalidArgumentException;

enum ReservationStatusEnum: int
{
    case PENDING = 0;
    case DELIVERED = 1;
    case CANCEL = 2;

    /**
     * @param $value
     * @return string
     */
    public static function label($value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return strtolower($case->name);
            }
        }

        throw new InvalidArgumentException('Invalid value: ' . $value);
    }
}
