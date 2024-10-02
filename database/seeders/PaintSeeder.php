<?php

namespace Database\Seeders;

use App\Models\Paint;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paint::factory()->count(10)->create();
        Paint::factory()->count(4)->add_link()->create();

        foreach (Post::all() as $post) {
            $paints = Paint::inRandomOrder()->take(rand(1, 5))->pluck('id');

            $post->paints()->attach($paints);
        }
    }
}
