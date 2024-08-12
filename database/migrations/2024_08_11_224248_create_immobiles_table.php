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
        Schema::create('immobiles', function (Blueprint $table) {
            $table->id();
            $table->string('salesCentralCode', 50);
            $table->string('propertyCode',50);
            $table->string('propertyTitle',150);
            $table->string('model',50);
            $table->string('propertyType',50);
            $table->string('state',50);
            $table->string('city',50);
            $table->string('neighborhood',150);
            $table->string('address',150);
            $table->string('number',50);
            $table->string('zipCode',25);
            $table->float('rentalPrice');
            $table->float('condominiumPrice');
            $table->float('propertyIptPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immobiles');
    }
};
