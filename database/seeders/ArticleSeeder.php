<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\SDGCategory;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Retrieve all categories
        $categories = ArticleCategory::all();

        // Exit seeder if no categories are found
        if ($categories->isEmpty()) {
            $this->command->warn("No article categories found. Please seed the ArticleCategory table first.");
            return;
        }

        // Sample article data
        $articles = [
            [
                'title' => 'Improving Campus Infrastructure',
                'category' => 'Administration',
                'author' => 'John Doe',
                'short_description' => 'Efforts to upgrade the university’s infrastructure.',
                'content' => 'Detailed article content about infrastructure improvements...',
                'event_date' => now()
            ],
            // Additional articles as in your original array
        ];

        // Fetch all SDGs
        $sdgs = SDGCategory::all();

        // Exit seeder if no SDGs are found
        if ($sdgs->isEmpty()) {
            $this->command->warn("No SDG categories found. Please seed the SDGCategory table first.");
            return;
        }

        foreach ($articles as $articleData) {
            // Find the category by name
            $category = $categories->where('name', $articleData['category'])->first();

            // Skip if the category is not found
            if (!$category) {
                $this->command->warn("Category '{$articleData['category']}' not found.");
                continue;
            }

        //     // Create the article
        //     $article = Article::create([
        //         'title' => $articleData['title'],
        //         'category_id' => $category->id,
        //         'author' => $articleData['author'],
        //         'short_description' => $articleData['short_description'],
        //         'content' => $articleData['content'],
        //         'event_date' => $articleData['event_date']
        //     ]);

            // Randomly associate SDGs (between 1-3 per article)
            $randomSDGs = $sdgs->random(min(3, $sdgs->count()))->pluck('id')->toArray();
            $article->sdgs()->sync($randomSDGs);
        }
    }
}
