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
        DB::table('tag_types')->delete();
        DB::table('tags')->delete();
        DB::table('post_has_tag')->delete();
        DB::table('paint_brands')->delete();
        DB::table('paints')->delete();
        DB::table('paint_blocks')->delete();
        DB::table('paint_block_lines')->delete();
        DB::table('user_voted_paint_block')->delete();
        DB::table('paint_block_line_has_paint')->delete();
        DB::table('post_has_paint')->delete();
        DB::table('paint_deltas')->delete();

        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            ImageSeeder::class,
            CollectionSeeder::class,
            CommentSeeder::class,
            TagTypeSeeder::class,
            TagSeeder::class,
            PaintBrandSeeder::class,
            PaintSeeder::class,
            PaintBlockSeeder::class,
            PaintBlockLineSeeder::class,
            PaintDeltaSeeder::class
        ]);
    }
}
