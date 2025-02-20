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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->longText("profile");
            $table->longText("name");
            $table->string("email")->unique();
            $table->longText("password");
            $table->longText("whatsapp")->nullable();
            $table->longText("city")->nullable();
            $table->longText("description")->nullable();
            $table->string("registration")->nullable();
            $table->boolean("dive")->default(0);
            $table->boolean("merchant")->default(0);
            $table->boolean("massage")->default(0);
            $table->string("gender")->nullable();
            $table->unsignedBigInteger("OTP");
            $table->boolean("activated")->default(0);
            $table->unsignedBigInteger("following_count")->default(0);
            $table->unsignedBigInteger("is_private")->default(0);
            $table->unsignedBigInteger("blocked")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
