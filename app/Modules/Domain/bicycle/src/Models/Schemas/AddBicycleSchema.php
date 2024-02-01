<?php

namespace Bicycle\Modules\Domain\Bicycle\Models\Schemas;

use App\Modules\Domain\bicycle\src\Models\Schemas\Constants\BicycleConstants;
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
            $table->string(BicycleConstants::TITLE);
            $table->unsignedInteger(BicycleConstants::INVENTORY);
            $table->boolean(BicycleConstants::IS_ACTIVE)->default(0);
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
