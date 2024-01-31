<?php

namespace Bicycle\Modules\Domain\Bicycle\Models;

use Bicycle\Modules\Domain\Core\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'inventory', 'is_active'];

    protected $appends = ['active_inventory'];

    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }

//    /**
//     * @return mixed
//     */
//    public function getActiveInventoryAttribute()
//    {
//        $date = \request()->query('date') ?? Carbon::now()->toDateString();
//        return (new Inventory($this))->Inventory($date);
//    }
//
//    /**
//     * @return HasMany
//     */
//    public function reservations(): HasMany
//    {
//        return $this->hasMany(Reservation::class);
//    }
}
