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
        Schema::create('dive_users', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("gender");
            $table->string("city");
            $table->string("cert_level");
            $table->string("cert_no");
            $table->longText("description")->nullable();
            $table->longText("profile");
            $table->unsignedBigInteger('user_id');
            $table->integer("is_paid")->default(0)->comment('1 means paid & 0 means unpaid.');
            $table->unsignedBigInteger('total_earning')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dive_users');
    }
};
