<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaintBrand>
 */
class PaintBrandFactory extends Factory
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
            'created_by' => User::all()->random()->id,
        ];
    }

    public function link(): static
    {
        return $this->state(fn(array $attributes) => [
            'site_link' => fake()->link(),
        ]);
    }
}
