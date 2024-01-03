<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Post $post){
        $tags = Tag::all();
        $selectedTags = $post->tags;
        $categories = Category::all();
        return view('post.edit', compact('post','categories', 'tags','selectedTags'));
    }
}
