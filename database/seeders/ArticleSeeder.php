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
        // Sample categories
        $categories = ArticleCategory::all();

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
            [
                'title' => 'Promoting Quality Education',
                'category' => 'Academics',
                'author' => 'Jane Smith',
                'short_description' => 'Ensuring quality education in line with SDG 4.',
                'content' => 'Detailed article content about quality education initiatives...',
                'event_date' => now()
            ],
            [
                'title' => 'Research on Climate Change',
                'category' => 'Research',
                'author' => 'Mark Johnson',
                'short_description' => 'Research initiatives for addressing climate change.',
                'content' => 'Detailed article content about climate change research...',
                'event_date' => now()
            ],
            [
                'title' => 'International Partnerships for Development',
                'category' => 'Internationalization',
                'author' => 'Emily Davis',
                'short_description' => 'Building partnerships for sustainable development.',
                'content' => 'Detailed article content about international partnerships...',
                'event_date' => now()
            ]
        ];

        // Fetch all SDGs
        $sdgs = SDGCategory::all();

        foreach ($articles as $articleData) {
            // Find the category by name
            $category = $categories->where('name', $articleData['category'])->first();

            // Create the article
            $article = Article::create([
                'title' => $articleData['title'],
                'category_id' => $category->id,
                'author' => $articleData['author'],
                'short_description' => $articleData['short_description'],
                'content' => $articleData['content'],
                'event_date' => $articleData['event_date']
            ]);

            // Randomly associate SDGs (between 1-3 per article)
            $randomSDGs = $sdgs->random(rand(1, 3))->pluck('id')->toArray();
            $article->sdgs()->sync($randomSDGs);
        }
    }
}
