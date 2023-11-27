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
        Schema::create('professionals', function (Blueprint $table) {
            $table->id();
            $table->string('profession',150)->nullable();
            $table->string('activity',150)->nullable();
            $table->string('name_bussiness',150)->nullable();
            $table->string('cnpj',30)->nullable();
            $table->string('employment_relationship',150)->nullable();
            $table->datetime('admission_date')->nullable();
            $table->string('function',150)->nullable();
            $table->string('contact_person',150)->nullable();
            $table->string('email',150)->nullable();
            $table->float('salary',8,2)->nullable();
            $table->float('other_rents',8,2)->nullable();
            $table->string('other_income_source',150)->nullable();
            $table->string('object_id',15)->nullable();
            $table->string('object_type',150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professionals');
    }
};
