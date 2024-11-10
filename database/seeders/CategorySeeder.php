<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Administration', 'Academics', 'Research', 'Internationalization'];

        foreach ($categories as $category) {
            Category::create(['category' => $category]);
        }
    }
}