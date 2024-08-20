<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('posts')->delete();
        DB::table('images')->delete();
        DB::table('collections')->delete();
        DB::table('user_saved_collection')->delete();
        DB::table('collection_has_post')->delete();
        DB::table('comments')->delete();
        DB::table('user_likes_comment')->delete();
        DB::table('tags')->delete();
        DB::table('post_has_tag')->delete();

        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            ImageSeeder::class,
            CollectionSeeder::class,
            CommentSeeder::class,
            TagSeeder::class,
        ]);
    }
}
