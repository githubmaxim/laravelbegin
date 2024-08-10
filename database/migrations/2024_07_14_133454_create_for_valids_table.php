<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('for_valid_mains', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->timestamps();
        });

        Schema::create('for_valids', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->foreignId('for_valid_mains_id')->constrained(); //нужно было добавить "->index()", так БД PostgreSQL
            // не индексирует автоматически внешние ключи (в отличие от MySQL). Индексация нужна для повышения производительности и точности данных.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('for_valids');
        Schema::dropIfExists('for_valid_mains');
    }
};
