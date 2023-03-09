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
            'title' => 'Test',
            'desc' => 'Testing Description',
            'video' => 'https://www.youtube.com/embed/hXOCjdtKiks',
            'published' => true,
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'title' => 'Test2',
            'desc' => 'Testing Data2',
            'video' => 'https://www.youtube.com/embed/hXOCjdtKiks',
            'published' => false,
        ]);
    }
}
