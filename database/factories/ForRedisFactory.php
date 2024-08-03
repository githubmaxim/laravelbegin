<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\ForRedis;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ForRedisFactory extends Factory
{
    protected $model = ForRedis::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => fake()->realText(20),
            'content' => fake()->text(300),
            'likes' => fake()->numberBetween(20, 100),
        ];
    }
}
