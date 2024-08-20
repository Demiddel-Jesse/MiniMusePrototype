<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
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
            'type' => fake()->name(),
            'created_by' => User::all()->random()->id,
        ];
    }

    public function color(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => fake()->colorName(),
            'type' => 'color',
            'hexcode' => fake()->safeHexColor()
        ]);
    }
}
