<?php

use App\Modules\Domain\reservation\src\Models\Schemas\AddReservationSchema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        AddReservationSchema::createTable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        AddReservationSchema::dropTable();
    }
};
