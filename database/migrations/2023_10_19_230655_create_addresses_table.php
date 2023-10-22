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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('cep', 15)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('number', 15)->nullable();
            $table->string('complement', 15)->nullable();
            $table->string('neighborhood', 150)->nullable();
            $table->string('city', 150)->nullable();
            $table->string('UF', 15)->nullable();
            $table->string('object_id', 15)->nullable();
            $table->string('object_type', 50)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
