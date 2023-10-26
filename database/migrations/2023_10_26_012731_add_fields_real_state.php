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
        Schema::table('real_states', function (Blueprint $table) {
            $table->string('phone_fixed', 50)->nullable();
            $table->string('phone_mobile', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('real_states', function (Blueprint $table) {
            $table->dropColumn('phone_fixed');
            $table->dropColumn('phone_mobile');
        });
    }
};
