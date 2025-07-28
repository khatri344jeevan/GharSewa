<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            //foreign key: user, property and package
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->string('khalti_pidx')->nullable(); // Khalti payment identifier for record keeping


            $table->dateTime('booking_date');

            //status will include pending,confirmed, upcoming , canceled


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
