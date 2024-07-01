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
        Schema::create('web_events', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('account_id')->nullable()->index('account_id');
            $table->timestamp('occurred_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('channel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_events');
    }
};
