<?php

namespace Bicycle\Modules\Domain\Reservation\Models\Schemas;

use Bicycle\Modules\Domain\Reservation\Enums\ReservationStatusEnum;
use Bicycle\Modules\Domain\Reservation\Models\Schemas\Constants\ReservationConstants;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReservationSchema
{
    /**
     * @return void
     */
    public static function createTable(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId(ReservationConstants::USER_ID);
            $table->foreignId(ReservationConstants::BICYCLE_ID);
            $table->unsignedInteger(ReservationConstants::QUANTITY);
            $table->timestamp(ReservationConstants::START)->comment('start reservation date');
            $table->timestamp(ReservationConstants::END)->comment('end reservation date');
            $table->tinyInteger(ReservationConstants::STATUS)->default(ReservationStatusEnum::PENDING->value);
            $table->timestamps();

            $table->foreign(ReservationConstants::USER_ID)
                ->references(ReservationConstants::ID)
                ->on('users')
                ->onDelete('no action');
            $table->foreign(ReservationConstants::BICYCLE_ID)
                ->references(ReservationConstants::ID)
                ->on(ReservationConstants::BICYCLES)
                ->onDelete('no action');
        });
    }

    /**
     * @return void
     */
    public static function dropTable(): void
    {
        Schema::dropIfExists(ReservationConstants::RESERVATIONS);
    }
}
