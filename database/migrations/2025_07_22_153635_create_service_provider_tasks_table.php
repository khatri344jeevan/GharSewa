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
        Schema::create('service_provider_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_provider_id'); //unsignedBigInteger - only takes positive values
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('service_provider_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provider_tasks');
    }
};
