<?php

namespace Database\Seeders;

use App\Models\TagType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tagTypes = [
            'standard',
            'style',
            'color',
            'color scheme',
            'unit',
            'faction',
            'franchise',
        ];

        foreach ($tagTypes as $tagType) {
            TagType::factory()->defined($tagType)->create();
        }
    }
}
