<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('for_caches', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('context');
            $table->integer('day_created');
            $table->foreignId('for_cache_user_id')->index()->constrained('for_cache_users');//добавил "->index()", так БД PostgreSQL
            // не индексирует автоматически внешние ключи (в отличие от MySQL). Индексация нужна для повышения производительности и точности данных.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('for_caches');
    }
};
