<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\ForCache;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ForCacheFactory extends Factory
{
    protected $model = ForCache::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'context' => $this->faker->word(),
            'day_created' => $this->faker->randomNumber(),
        ];
    }
}
