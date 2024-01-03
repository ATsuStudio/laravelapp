<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create();
        $posts = Post::factory(10)->create();
        $tags = Tag::factory(5)->create();

        foreach ($posts as $key => $post) {
            $tagIDs = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagIDs);
        }
    }
}
