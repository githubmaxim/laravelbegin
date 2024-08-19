<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('for_mails', function (Blueprint $table) {
            $table->id()->index();
            $table->string('email')->nullable(false)->unique();
            $table->string('name')->nullable(false);
            $table->string('content')->nullable(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('for_mails');
    }
};
