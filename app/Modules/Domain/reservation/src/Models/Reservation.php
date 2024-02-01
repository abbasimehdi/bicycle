<?php

namespace Bicycle\Modules\Domain\Reservation\Models;

use App\Models\User;
use Bicycle\Modules\Domain\Bicycle\Models\Bicycle;
use Bicycle\Modules\Domain\Reservation\database\factories\ReservationFactory;
use Bicycle\Modules\Domain\Reservation\Models\Schemas\Constants\ReservationConstants;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        ReservationConstants::USER_ID,
        ReservationConstants::BICYCLE_ID,
        ReservationConstants::QUANTITY,
        ReservationConstants::START,
        ReservationConstants::END,
        ReservationConstants::STATUS
    ];

    protected $hidden = ['id'];
    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return ReservationFactory::new();
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function bicycle(): BelongsTo
    {
        return $this->belongsTo(Bicycle::class);
    }
}
