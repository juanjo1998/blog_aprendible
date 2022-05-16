<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'category 1'
        ]);

        Category::create([
            'name' => 'category 2'
        ]);

        Category::create([
            'name' => 'category 3'
        ]);
    }
}