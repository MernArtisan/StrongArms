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
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('provider_id')->nullable()->after('id');

            // If you want to enforce foreign key constraint (optional):
            $table->foreign('provider_id')->references('id')->on('provider_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // If you added a foreign key, drop it first
            // $table->dropForeign(['product_id']);
            $table->dropColumn('provider_id');
        });
    }
};
