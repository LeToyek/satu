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
        Schema::table('users', function (Blueprint $table) {
            // address, gender, birth date, role
            $table->string('address')->nullable();
            $table->enum('gender', ['l', 'p'])->default('l');
            $table->date('birth_date')->nullable();
            $table->enum('role', ['admin', 'partner', 'funder'])->default('partner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('address');
            $table->removeColumn('gender');
            $table->removeColumn('birth_date');
            $table->removeColumn('role');
        });
    }
};
