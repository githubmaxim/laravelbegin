<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->string('Code')->unique();
            $table->string('Name')->unique();
            $table->integer('SurfaceArea');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country');
    }
};
