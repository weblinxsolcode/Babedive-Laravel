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
        Schema::create('diver_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diver_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('feedback');

            $table->foreign('diver_id')->references('id')->on('dive_users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->booleon("status")->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diver_feedbacks');
    }
};
