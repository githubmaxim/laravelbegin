<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Polymorph\Videomm;
use App\Models\Polymorph\Videomo;
use App\Models\Polymorph\Videooo;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
//        Videooo::factory()->count(5)->create();
//        Videomo::factory()->count(5)->create();
        Videomm::factory()->count(5)->create();
    }
}
