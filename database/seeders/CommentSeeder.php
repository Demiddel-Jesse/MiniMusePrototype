<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory()->count(100)->create();

        foreach (Comment::all() as $comment) {
            $users = User::inRandomOrder()->take(rand(1, 10))->pluck('id');

            foreach ($users as $user) {
                $comment->users_liked()->attach($user);
            }
        }
    }
}
