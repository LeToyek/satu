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
        Schema::table('fundings', function (Blueprint $table) {
            //
            $table->addColumn('integer', 'price', [ 'nullable' => true]);
        });
        Schema::table('fund_transactions', function (Blueprint $table) {
            //
            $table->removeColumn('value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fundings_and_remove_value_transaction', function (Blueprint $table) {
            //
        });
    }
};
