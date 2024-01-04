<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post){
        $tags = $post->tags;
        $category = Category::find($post->category_id);
        
        return view('post.show', compact('post', 'category', 'tags'));
    }
}
