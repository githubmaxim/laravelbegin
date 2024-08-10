<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\ForCacheUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ForCacheUserFactory extends Factory
{
    protected $model = ForCacheUser::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt($this->faker->password()),
            'remember_token' => Str::random(10),
        ];
    }
}
