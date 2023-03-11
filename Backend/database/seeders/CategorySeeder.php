<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories')->insert([
            'name' => 'Eye',
            'desc' => 'Item that make/use for eyes'
        ]);

        DB::table('categories')->insert([
            'name' => 'Lip',
            'desc' => 'Item that make/use for lips'
        ]);

        DB::table('categories')->insert([
            'name' => 'Base',
            'desc' => 'Item that make/use for base before others'
        ]);

        // Skincare
        DB::table('categories')->insert([
            'name' => 'Moisture/Cica',
            'desc' => 'Item that protect skin moisture'
        ]);

        DB::table('categories')->insert([
            'name' => 'Wrinkle Care/Whitening',
            'desc' => 'Item that whitening skin'
        ]);

        DB::table('categories')->insert([
            'name' => 'Cleansing',
            'desc' => 'Item that clean skin'
        ]);

        DB::table('categories')->insert([
            'name' => 'Moisture/Calming',
            'desc' => 'Item that protect moisture skin and it is so calming'
        ]);

        // Hair
        DB::table('categories')->insert([
            'name' => 'Hair Color',
            'desc' => 'Item that coloring hair'
        ]);

        DB::table('categories')->insert([
            'name' => 'Cica Volume Care',
            'desc' => 'Item that protect hair volume'
        ]);

        DB::table('categories')->insert([
            'name' => 'Salon Spa',
            'desc' => 'Item that use for salon spa'
        ]);

        DB::table('categories')->insert([
            'name' => 'Volume Care',
            'desc' => 'Item that protect hair volume'
        ]);

        DB::table('categories')->insert([
            'name' => 'Anti Hair Loss',
            'desc' => 'Item that protect from hair loss'
        ]);

        DB::table('categories')->insert([
            'name' => 'Etc',
            'desc' => 'Other item'
        ]);
    }
}
