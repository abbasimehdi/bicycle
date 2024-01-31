<?php

use Bicycle\Modules\Domain\Bicycle\Models\Schemas\AddBicycleSchema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        AddBicycleSchema::createTable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        AddBicycleSchema::dropTable();
    }
};
