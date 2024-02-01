<?php

namespace Bicycle\Modules\Domain\Bicycle\Models;

use App\Modules\Domain\reservation\src\Patterns\Builder\Inventory;
use Bicycle\Modules\Domain\Bicycle\database\factories\BicycleFactory;
use Bicycle\Modules\Domain\Core\Scopes\ActiveScope;
use Bicycle\Modules\Domain\Reservation\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bicycle extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'inventory', 'is_active'];

    protected $appends = ['active_inventory'];

    protected $primaryKey= "id";
    /**
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return BicycleFactory::new();
    }

    /**
     * @return mixed
     */
    public function getActiveInventoryAttribute(): mixed
    {
        $date = \request()->query('date') ?? Carbon::now()->toDateString();
        return (new Inventory($this))->Inventory($date);
    }

    /**
     * @return HasMany
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
