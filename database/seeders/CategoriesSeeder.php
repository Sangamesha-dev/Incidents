<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Security',
        ]);
        DB::table('categories')->insert([
            'name' => 'Health & Safety',
        ]);
        DB::table('categories')->insert([
            'name' => 'Loss Prevention',
        ]);
    }
}
