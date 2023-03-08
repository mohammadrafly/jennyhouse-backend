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
            'desc' => 'Testing Data',
            'img' => 'nothing.png',
            'published' => true,
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'title' => 'Test2',
            'desc' => 'Testing Data2',
            'img' => 'nothing2.png',
            'published' => false,
        ]);
    }
}
