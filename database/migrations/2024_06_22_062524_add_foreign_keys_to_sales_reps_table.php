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
        Schema::table('sales_reps', function (Blueprint $table) {
            $table->foreign(['region_id'], 'sales_reps_ibfk_1')->references(['id'])->on('region')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_reps', function (Blueprint $table) {
            $table->dropForeign('sales_reps_ibfk_1');
        });
    }
};
