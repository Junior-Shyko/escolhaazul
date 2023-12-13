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
        Schema::table('data_personals', function (Blueprint $table) {
            $table->string('identity', 100)->nullable();
            $table->string('naturality', 100)->nullable();
            $table->string('maritalStatus', 100)->nullable();
            $table->string('number_dependents', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_personals', function (Blueprint $table) {
            $table->dropColumn('identity');
            $table->dropColumn('naturality');
            $table->dropColumn('maritalStatus');
            $table->dropColumn('number_dependents');
        });
    }
};
