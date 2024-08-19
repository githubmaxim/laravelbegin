<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\ForMail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ForMailFactory extends Factory
{
    protected $model = ForMail::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'content' => $this->faker->word(),
        ];
    }
}
