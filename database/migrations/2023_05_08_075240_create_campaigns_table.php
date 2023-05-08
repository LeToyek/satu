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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->bigInteger('fund_target');
            $table->double('return_percentage');
            $table->integer('tenor');
            $table->date('start_date');
            $table->date('finish_date');
            $table->enum('status', ['funding_open', 'funding_close', 'waiting_for_disbursement', 'on_going', 'waiting_for_return', 'return_distribution', 'finished'])->default('funding_open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
