<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('post2_s', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->integer('status')->default(0);
            $table->string('content')->nullable();
            $table->timestamps();
            $table->foreignId('category2_s_id')->constrained(); //нужно было добавить "->index()", так как БД PostgreSQL
            // не индексирует автоматически внешние ключи (в отличие от MySQL). Индексация нужна для повышения производительности и точности данных.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post2_s');
    }
};
