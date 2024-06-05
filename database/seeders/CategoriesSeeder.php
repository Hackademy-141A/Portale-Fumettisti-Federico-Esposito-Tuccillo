<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'HORROR',
        ]);
        Category::create([
            'name' => 'LEGGENDA',
        ]);
        Category::create([
            'name' => 'SUPEREROI',
        ]);
        Category::create([
            'name' => 'ACTION',
        ]);
        Category::create([
            'name' => 'AVVENTURA',
        ]);
        Category::create([
            'name' => 'FANTASY',
        ]);
        Category::create([
            'name' => 'LEGGENDA',
        ]);
    }
}
