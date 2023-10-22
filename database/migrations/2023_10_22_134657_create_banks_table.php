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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name_bank', 150)->nullable();
            $table->string('name_agency', 150)->nullable();
            $table->string('number_acoount', 50)->nullable();
            $table->string('name_manager', 50)->nullable();
            $table->string('phone_manager', 50)->nullable();
            $table->string('email_manager', 150)->nullable();
            $table->date('client_since')->nullable()->comment('Cliente desde');
            $table->float('credit_approved', 8,2)->nullable();
            $table->string('name_credit_card1', 50)->nullable();
            $table->string('name_credit_card2', 50)->nullable();
            $table->float('limit_credit_card1', 8,2)->nullable();
            $table->float('limit_credit_card2', 8,2)->nullable();
            $table->string('name_bank_application1', 50)->nullable();
            $table->string('name_agency_application1', 50)->nullable();
            $table->string('name_account_application1', 50)->nullable();
            $table->float('value_application1', 8,2)->nullable();
            $table->string('name_bank_application2', 50)->nullable();
            $table->string('name_agency_application2', 50)->nullable();
            $table->string('name_account_application2', 50)->nullable();
            $table->float('value_application2', 8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
