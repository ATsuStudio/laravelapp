<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends BaseController
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
    public function __invoke(UpdateRequest $request, Post $post){
        $data = $request->validated();


        $tags = isset($data['tags'])? $data['tags'] : [];

        unset($data['tags']);

        $data['is_published'] = isset($data['is_published'])? 1:0;
        $post->update($data);

        $post->tags()->sync($tags);
        
        
        return redirect()->route('posts.show',  $post->id);
    }
}
