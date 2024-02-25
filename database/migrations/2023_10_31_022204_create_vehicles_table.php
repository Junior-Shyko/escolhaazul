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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('branch', 150)->nullable();
            $table->string('model', 50)->nullable();
            $table->char('year', 5)->nullable();
            $table->string('plate', 10)->nullable();
            $table->char('financed', 3)->nullable();
            $table->string('financial', 100)->nullable();
            $table->float('value',10,2)->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
