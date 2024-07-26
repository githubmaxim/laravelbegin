<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\ForAutent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ForAutentFactory extends Factory
{
    protected $model = ForAutent::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'login' => $this->faker->word(),
            'password' => bcrypt($this->faker->password()),
        ];
    }
}
