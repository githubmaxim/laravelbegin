<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\ForValid;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ForValidFactory extends Factory
{
    protected $model = ForValid::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'content' => $this->faker->word(),
            'status' => $this->faker->randomNumber(),
        ];
    }
}
