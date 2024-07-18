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
        Schema::table('for_valids', function (Blueprint $table) {
            $table->string('title')->change();
            $table->string('content')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('for_valids', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('content')->nullable()->change();
        });
    }
};
