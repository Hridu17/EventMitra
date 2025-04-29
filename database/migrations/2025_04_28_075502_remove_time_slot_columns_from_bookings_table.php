<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // First drop the foreign key constraint
            $table->dropForeign(['time_slot_id']);
            // Then drop the column itself
            $table->dropColumn('time_slot_id');
            $table->dropColumn('booking_time');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('time_slot_id')->nullable();
            $table->timestamp('booking_time')->nullable();

          
        });
    }
};
