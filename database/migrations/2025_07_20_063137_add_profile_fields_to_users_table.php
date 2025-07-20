<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_profile_fields_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This method is called when we run "php artisan migrate".
     * It adds new columns to our 'users' table.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // A place to store the path to the user's profile picture.
            // It can be null because a new user won't have a photo.
            $table->string('avatar')->nullable()->after('email');

            // A text field for the user's phone number.
            $table->string('phone_number')->nullable()->after('avatar');

            // A longer text field for the user's professional bio.
            $table->text('bio')->nullable()->after('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     * This method is called if we ever need to undo the migration.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // This removes the columns if we roll back.
            $table->dropColumn(['avatar', 'phone_number', 'bio']);
        });
    }
};