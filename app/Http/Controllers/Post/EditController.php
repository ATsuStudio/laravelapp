<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Post $post){
        $categories = Category::all();
        return view('post.edit', compact('post','categories'));
    }
}
