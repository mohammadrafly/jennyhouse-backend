<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_products')->insert([
            'post_id' => 1,
            'product_id' => 1
        ]);

        DB::table('post_products')->insert([
            'post_id' => 2,
            'product_id' => 2
        ]);
    }
}
