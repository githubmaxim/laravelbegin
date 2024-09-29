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
        Schema::create('commentmmables', function (Blueprint $table) {
//            $table->bigIncrements('commentmm_id');
            $table->id();
            $table->foreignIdFor(\App\Models\Polymorph\Commentmm::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('commentmmable_id');
            $table->string('commentmmable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentmmables');
    }
};
