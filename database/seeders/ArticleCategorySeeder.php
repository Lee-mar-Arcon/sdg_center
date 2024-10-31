<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;

class ArticleCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Administration', 'Academics', 'Research', 'Internationalization'];

        foreach ($categories as $category) {
            ArticleCategory::create(['name' => $category]);
        }
    }
}
