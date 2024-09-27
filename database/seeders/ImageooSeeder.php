<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Polymorph\Imageoo;
use Illuminate\Database\Seeder;

class ImageooSeeder extends Seeder
{
    public function run(): void
    {
        Imageoo::factory()->count(5)->create();
    }
}
