<?php
declare(strict_types=1);

namespace Database\Factories\Polymorph;

use App\Models\Polymorph\Imageoo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ImageooFactory extends Factory
{
    protected $model = Imageoo::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
        ];
    }
}
