<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory()->count(10)->create();
        Tag::factory()->count(10)->color()->create();

        foreach (Tag::all() as $tag) {
            $posts = Post::inRandomOrder()->take(rand(1, 4))->pluck('id');

            $tag->posts()->attach($posts);
        }
    }
}
