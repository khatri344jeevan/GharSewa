<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('service_providers', function (Blueprint $table) {
            // Only add column if it does not already exist
            if (!Schema::hasColumn('service_providers', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
                
                // Optional: Add foreign key constraint if needed
                // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('service_providers', function (Blueprint $table) {
            if (Schema::hasColumn('service_providers', 'user_id')) {
                // Optional: Drop foreign key first if added
                // $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
