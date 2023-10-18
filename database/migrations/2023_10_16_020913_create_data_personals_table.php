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
        Schema::create('data_personals', function (Blueprint $table) {
            $table->id();
            $table->string('sex', 15)->nullable();
            $table->date('birthDate')->nullable();
            $table->string('organConsignor', 25)->nullable();
            $table->string('cpf', 15)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('EducationLevel', 50)->nullable();
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
        Schema::dropIfExists('data_personals');
    }
};
