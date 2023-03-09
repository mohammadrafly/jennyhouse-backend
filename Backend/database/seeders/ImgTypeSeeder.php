<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImgTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('image_types')->insert([
            'name' => 'Header'
        ]);
        DB::table('image_types')->insert([
            'name' => 'Content'
        ]);
    }
}
