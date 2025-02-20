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
        Schema::create('dive_user_images', function (Blueprint $table) {
            $table->id();
            $table->longText('image');
            $table->unsignedBigInteger('diver_id');
            $table->foreign('diver_id')->references('id')->on('dive_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dive_user_images');
    }
};
