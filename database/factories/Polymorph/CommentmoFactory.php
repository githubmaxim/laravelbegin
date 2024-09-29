<?php
declare(strict_types=1);

namespace Database\Factories\Polymorph;

use App\Models\Polymorph\Commentmo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CommentmoFactory extends Factory
{
    protected $model = Commentmo::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'body' => $this->faker->word(),
            'commentmoable_id' => $this->faker->randomNumber(),
            'commentmoable_type' => $this->faker->word(),
        ];
    }
}
