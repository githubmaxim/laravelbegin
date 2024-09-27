<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Polymorph\Videooo;
use Illuminate\Database\Seeder;

class VideoooSeeder extends Seeder
{
    public function run(): void
    {
        Videooo::factory()->count(5)->create();
    }
}
