<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Test',
            'desc' => 'Testing Description',
            'video' => 'https://www.youtube.com/embed/hXOCjdtKiks',
            'published' => true,
            'created_at' => '2023-03-09 11:08:37',
            'updated_at' => '2023-03-09 11:10:37',
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'category_id' => 1,
            'title' => 'Test2',
            'desc' => 'Testing Data2',
            'video' => 'https://www.youtube.com/embed/hXOCjdtKiks',
            'published' => false,
            'created_at' => '2023-03-09 11:10:37',
            'updated_at' => '2023-03-09 11:15:37',
        ]);
    }
}
