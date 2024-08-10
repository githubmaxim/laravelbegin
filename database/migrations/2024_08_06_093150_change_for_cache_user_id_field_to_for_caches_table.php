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
        Schema::table('for_caches', function (Blueprint $table) {
            $table->dropForeign('for_caches_for_cache_user_id_foreign');
            $table->foreign('for_cache_user_id')->references('id')->on('for_cache_users')->onDelete('cascade')->onUpdate('cascade');
            //!!! Если бы я хотел добавить еще и index к столбцу 'for_cache_user_id', при таком написании
            // создания внешнего ключа как выше, то мне пришлось бы добавлять его отдельной строкой:
//            $table->integer('for_cache_user_id')->index(); !!!
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('for_caches', function (Blueprint $table) {
            $table->dropForeign(['for_cache_user_id']);
            $table->foreignId('for_cache_user_id')->constrained();
        });
    }
};
