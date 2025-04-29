<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // User information
            // $table->string('name');
            // $table->string('email');
            $table->string('event_type');
            $table->date('event_date');
            // $table->string('phoneNumber');
            $table->string('location');

            // Decoration
            $table->unsignedBigInteger('decoration_id')->nullable();
            $table->boolean('use_existing')->default(true);



            $table->decimal('total_price', 10, 2)->nullable();
            $table->string('payment_status')->default('pending'); // pending, paid, partial

            $table->timestamps();

            $table->foreign('decoration_id')->references('id')->on('decorations')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
