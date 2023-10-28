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
        Schema::create('commercials', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('cnpj', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('phone_fixed', 50)->nullable();
            $table->string('phone_mobile', 50)->nullable();
            $table->string('object_id', 50)->nullable();
            $table->string('object_type', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercials');
    }
};
