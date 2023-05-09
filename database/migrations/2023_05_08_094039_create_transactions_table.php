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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_wallet_id')->constrained('wallets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('to_wallet_id')->constrained('wallets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('amount');
            $table->string('description')->nullable();
            $table->string('type')->default('transfer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
