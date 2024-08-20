<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'internal_name' => uuid_create(),
            'defined_name' => fake()->userName(),
            'user_id' => User::all()->random()->id
        ];
    }

    public function public(): static
    {
        return $this->state(fn(array $attributes) => [
            'public' => true,
        ]);
    }
}
