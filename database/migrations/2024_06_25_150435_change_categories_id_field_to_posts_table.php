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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
//            $table->foreignId('category_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete(); //нужно было добавить "->index()", так БД PostgreSQL
//            // не индексирует автоматически внешние ключи (в отличие от MySQL). Индексация нужна для повышения производительности и точности данных.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_category_id_foreign');
            $table->dropIndex('posts_category_id_foreign');
        });
    }
};
