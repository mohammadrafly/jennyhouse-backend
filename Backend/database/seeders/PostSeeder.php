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
            'slug' => 'testing-slugs',
            'content' => 'Testing Description',
            'image' => 'https://www.youtube.com/embed/hXOCjdtKiks',
            'published' => true,
            'created_at' => '2023-03-09 11:08:37',
            'updated_at' => '2023-03-09 11:10:37',
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'category_id' => 1,
            'title' => 'Test2',
            'slug' => 'testing-data2',
            'content' => 'Testing Data2',
            'image' => 'https://www.youtube.com/embed/hXOCjdtKiks',
            'published' => false,
            'created_at' => '2023-03-09 11:10:37',
            'updated_at' => '2023-03-09 11:15:37',
        ]);
    }
}
