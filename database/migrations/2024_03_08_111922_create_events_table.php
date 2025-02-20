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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('country');
            $table->date('from_date');
            $table->date('to_date');
            $table->string('no_of_persons');
            $table->string('trip_budget');
            $table->string('location');
            $table->string('type');
            $table->longText('description');
            $table->integer("status")->default(1);
            $table->integer("is_booked")->default(0);

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
        Schema::dropIfExists('events');
    }
};
