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
        Schema::create('category3_s__post3_s', function (Blueprint $table) {
            $table->primary(['category3_s_id', 'post3_s_id']);
            $table->integer('category3_s_id');
            $table->integer('post3_s_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category3_s__post3_s');
    }
};
