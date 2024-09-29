<?php
declare(strict_types=1);

namespace Database\Factories\Polymorph;

use App\Models\Polymorph\Commentmm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CommentmmFactory extends Factory
{
    protected $model = Commentmm::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
        ];
    }
}