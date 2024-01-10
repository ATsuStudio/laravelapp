<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class EditController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(Post $post){
        $acc_user = Auth::user();
        if($post->author != $acc_user->id){
            return redirect()->route('posts.show', $post->id)->with('edit', '0');
        }
        $tags = Tag::all();
        $selectedTags = $post->tags;
        $categories = Category::all();
        return view('post.edit', compact('post','categories', 'tags','selectedTags'));
    }
}
