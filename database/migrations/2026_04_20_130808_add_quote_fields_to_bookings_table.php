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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('title')->nullable()->after('artisan_id');
            $table->string('budget_range')->nullable()->after('description');
            $table->string('location')->nullable()->after('budget_range');
            $table->json('reference_images')->nullable()->after('image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['title', 'budget_range', 'location', 'reference_images']);
        });
    }
};
