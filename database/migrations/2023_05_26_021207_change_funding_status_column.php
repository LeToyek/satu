<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::table('fundings', function (Blueprint $table) {
        //     $table->dropColumn('status');
        // });
        Schema::table('fundings', function (Blueprint $table) {
            $table->enum('status', ['on_going', 'on_sell', 'failed','repaid'])->default('on_going');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fundings', function (Blueprint $table) {
            //
        });
    }
};
