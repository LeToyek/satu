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
        Schema::create('fund_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funding_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('from_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('to_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('value')->comment('transaction value, might be different from funding value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_transactions');
    }
};
