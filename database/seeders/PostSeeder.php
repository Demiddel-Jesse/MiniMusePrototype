<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(2)->create();
        Post::factory()->count(2)->published()->public()->create();
        Post::factory()->count(2)->published()->create();
        Post::factory()->count(20)->published()->public()->thumbnail()->create();

        foreach (Post::all() as $post) {
            $users = User::inRandomOrder()->take(rand(1, 10))->pluck('id');

            $post->users_viewed_and_liked()->attach($users, ['liked' => rand(0, 1)]);
        }
    }
}
