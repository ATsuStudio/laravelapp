<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        
        $tags = $data['tags'];
        unset($data['tags']);

        $data['is_published'] = isset($data['is_published'])? 1:0;
        $post = Post::create($data);

        $post->tags()->attach($tags);
        
        
        return redirect()->route('posts.index');
    }
}
