<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Polymorph\Commentmm;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        Commentmm::factory()->count(5)->create();
    }
}
