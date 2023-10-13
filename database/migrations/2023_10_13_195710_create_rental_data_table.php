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
        Schema::create('rental_datas', function (Blueprint $table) {
            $table->id();
            $table->string('refImmobile', 200)->nullable(false);
            $table->string('typeRentalUser', 50)->nullable(false);
            $table->string('finality', 50)->nullable();
            $table->integer('term')->comment('Prazo Desejado')->nullable();
            $table->integer('warrantyType')->comment('Tipo de garantia')->nullable();
            $table->float('proposedValue', 8, 2)->nullable();
            $table->float('currentCondominiumValue', 8, 2)->nullable();
            $table->float('iptu', 8, 2)->nullable();
            $table->longText('ps')->nullable();
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
        Schema::dropIfExists('rental_data');
    }
};
