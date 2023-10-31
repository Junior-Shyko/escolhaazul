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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->float('value', 8,2)->nullable();
            $table->char('financed', 3)->nullable();
            $table->string('registration', 150)->nullable();
            $table->string('registry', 50)->nullable();
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
        Schema::dropIfExists('properties');
    }
};
