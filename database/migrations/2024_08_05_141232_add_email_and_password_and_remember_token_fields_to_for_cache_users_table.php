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
        Schema::table('for_cache_users', function (Blueprint $table) {
            $table->string('email', 255)->nullable(false)->unique('emailForCacheAutents');
            $table->string('password', 255)->nullable(false);
            $table->string('remember_token', 100)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('for_cache_users', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
        });
    }
};
