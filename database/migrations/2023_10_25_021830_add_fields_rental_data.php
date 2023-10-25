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
        Schema::table('rental_datas', function (Blueprint $table) {
            $table->string('object_id', 10)->nulable(false);
            $table->string('object_type', 100)->nulable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rental_datas', function (Blueprint $table) {
            $table->dropColumn('object_id');
            $table->dropColumn('object_type');
        });
    }
};
