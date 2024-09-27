<?php
declare(strict_types=1);

namespace Database\Factories\Polymorph;

use App\Models\Polymorph\Commentoo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CommentooFactory extends Factory
{
    protected $model = Commentoo::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'body' => $this->faker->word(),
            'commentable_id' => $this->faker->randomNumber(),
            'commentable_type' => $this->faker->word(),
        ];
    }
}
