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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('account_id')->nullable()->index('account_id');
            $table->timestamp('occurred_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('standard_qty')->nullable();
            $table->integer('gloss_qty')->nullable();
            $table->integer('poster_qty')->nullable();
            $table->integer('total')->nullable();
            $table->decimal('standard_amt_usd', 10)->nullable();
            $table->decimal('gloss_amt_usd', 10)->nullable();
            $table->decimal('poster_amt_usd', 10)->nullable();
            $table->decimal('total_amt_usd', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
