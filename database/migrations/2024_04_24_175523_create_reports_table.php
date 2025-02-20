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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("reported_by");
            $table->foreign("reported_by")->references("id")->on("users")->onDelete("cascade");

            $table->unsignedBigInteger("reported_to");
            $table->foreign("reported_to")->references("id")->on("users")->onDelete("cascade");

            $table->longText("subject");
            $table->longText("description");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
