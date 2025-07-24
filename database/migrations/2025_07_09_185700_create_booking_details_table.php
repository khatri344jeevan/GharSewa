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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();

            //foreign key

             $table->foreignId('booking_id')->constrained()->onDelete('cascade');
             $table->foreignId('provider_id')->constrained('service_providers')->onDelete('cascade');

             // Detail info
            $table->dateTime('scheduled_date');
            $table->string('status')->default('pending');
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
