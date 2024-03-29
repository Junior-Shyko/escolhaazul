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
            $table->string('refImmobile', 200)->nullable(true);
            $table->string('typeRentalUser', 50)->nullable(false);
            $table->string('finality', 50)->nullable();
            $table->integer('term')->comment('Prazo Desejado')->nullable();
            $table->string('warrantyType', 50)->comment('Tipo de garantia')->nullable();
            $table->float('proposedValue', 8, 2)->nullable();
            $table->float('currentCondominiumValue', 8, 2)->nullable();
            $table->float('iptu', 8, 2)->nullable();
            $table->longText('ps')->nullable();
            $table->foreignId('user_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');;
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
