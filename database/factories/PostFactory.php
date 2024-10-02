<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(8),
            'likes' => random_int(0, 100),
            'saves' => random_int(0, 100),
            'views_unique' => random_int(0, 100),
            'views_total' => random_int(0, 100),
            'user_id' => User::all()->random()->id,
        ];
    }

    public function published(): static
    {
        return $this->state(fn(array $attributes) => [
            'published' => true,
        ]);
    }

    public function public(): static
    {
        return $this->state(fn(array $attributes) => [
            'public' => true,
        ]);
    }

    public function thumbnail(): static
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        return $this->state(fn(array $attributes) => [
            'thumbnail' => $faker->imageUrl(width: 500, height: 500),
        ]);
    }
}
