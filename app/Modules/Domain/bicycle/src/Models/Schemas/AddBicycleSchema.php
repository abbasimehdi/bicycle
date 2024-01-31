<?php

namespace Bicycle\Modules\Domain\Bicycle\Models\Schemas;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBicycleSchema
{
    /**
     * @return void
     */
    public static function createTable(): void
    {
        Schema::create('bicycles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('inventory');
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public static function dropTable(): void
    {
        Schema::dropIfExists('bicycles');
    }
}
