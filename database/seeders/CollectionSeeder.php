<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collection::factory()
            ->count(5)
            ->create();

        Collection::factory()
            ->count(15)
            ->public()
            ->create();

        foreach (Collection::all() as $collection) {
            $users = User::inRandomOrder()->take(rand(1, 5))->pluck('id');
            $posts = Post::inRandomOrder()->take(rand(1, 5))->pluck('id');
            $collection->users_saved()->attach($users);
            $collection->posts()->attach($posts);
        }
    }
}
