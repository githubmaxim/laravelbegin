<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('for_autents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 255)->nullable(false)->unique('email');
            $table->string('password', 255)->nullable(false);
            $table->string('remember_token', 100)->nullable(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('for_autents');
    }
};
