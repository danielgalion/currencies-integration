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
        Schema::dropIfExists('currencies');

        Schema::create('currencies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('currency_code');
            $table->string('exchange_rate', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @todo test after adding several uuids
     * @todo test if autoincrement is back
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');

        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('currency_code');
            $table->string('exchange_rate', 20);
        });
    }
};
