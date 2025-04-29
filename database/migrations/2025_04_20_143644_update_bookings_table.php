<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Add new columns or alter columns here
        Schema::table('bookings', function (Blueprint $table) {
            // Example: Add a new column for tracking booking time
            $table->time('booking_time')->nullable();

            // Or you can add any other columns you need
            // $table->string('new_column')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // In case you want to rollback, you can drop any added columns
        Schema::table('bookings', function (Blueprint $table) {
            // Example: Drop the newly added column
            $table->dropColumn('booking_time');
        });
    }
};
