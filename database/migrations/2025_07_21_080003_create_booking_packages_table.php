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
        Schema::create('booking_packages', function (Blueprint $table)
         {
        $table->id();

        // Foreign keys
        $table->foreignId('booking_id')->constrained()->onDelete('cascade');
        $table->foreignId('package_id')->constrained()->onDelete('cascade');

        // Optional fields
        $table->date('start_date')->nullable();
        $table->date('end_date')->nullable();
        $table->decimal('price', 10, 2)->nullable(); // Price at time of booking

        $table->timestamps();
         });
    }

};
