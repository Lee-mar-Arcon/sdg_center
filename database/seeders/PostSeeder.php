<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Sample Post 1',
            'image' => 'sample1.jpg', // Assuming this is in the public storage
        ]);

        Post::create([
            'title' => 'Sample Post 2',
            'image' => 'sample2.jpg',
        ]);
    }
}
