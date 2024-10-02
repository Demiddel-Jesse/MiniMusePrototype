<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaintBlock>
 */
class PaintBlockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'community_made' => rand(0, 1),
            'votes' => random_int(0, 500),
            'post_id' => Post::all()->random()->id,
            'created_by' => User::all()->random()->id
        ];
    }
}
