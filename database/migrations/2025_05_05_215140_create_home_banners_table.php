<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('home_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('status');
            $table->string('redirect_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_banners');
    }
};
