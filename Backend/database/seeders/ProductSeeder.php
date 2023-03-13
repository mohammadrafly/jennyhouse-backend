<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            // 'category_id' => 2,
            'name' => 'Jenny House World Volume Coating Tint',
            'link' => 'https://enjennyhouse.imweb.me/make-up/?idx=418',
            'price' => 11.59,
            'desc' => 'Wow Loving it',
            'image' => '',
            'created_at' => '2023-03-09 11:10:37',
            'updated_at' => '2023-03-09 11:10:37',
        ]);
        DB::table('products')->insert([
            // 'category_id' => 3,
            'name' => 'Jenny House Fit Serum Custom',
            'link' => 'https://enjennyhouse.imweb.me/make-up/?idx=414',
            'price' => 33.71,
            'desc' => 'Wow Loving it',
            'image' => '',
            'created_at' => '2023-03-09 11:10:37',
            'updated_at' => '2023-03-09 11:10:37',
        ]);
    }
}
