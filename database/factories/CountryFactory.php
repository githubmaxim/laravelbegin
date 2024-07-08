<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'Code' => $this->faker->unique()->countryCode(),
            'Name' => $this->faker->unique()->country(),
            'SurfaceArea' => $this->faker->unique()->randomNumber(),
        ];
    }
}
