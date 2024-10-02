<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random_int = random_int(0, 40);

        if ($random_int <= 20) {
            $random_int = null;
        } else {
            $random_int -= 20;
        };

        return [
            'user_id' => User::all()->random()->id,
            'post_id' => Post::all()->random()->id,
            'comment' => fake()->paragraph(),
            'likes' => random_int(0, 500),
            'parent_id' => $random_int
        ];
    }
}
