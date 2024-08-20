<?php

namespace Database\Seeders;

use App\Models\PaintBlock;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaintBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaintBlock::factory()->count(20)->create();

        foreach (PaintBlock::all() as $paint_block) {
            $users = User::inRandomOrder()->take(rand(1, 5))->pluck('id');

            $paint_block->user_votes()->attach($users);
        }
    }
}
