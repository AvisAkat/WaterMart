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
        Schema::create('userProfiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('profile_pic')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            //$table->uuid('user_id')->nullable(false);
            $table->timestamps();

            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userProfiles');
    }
};
