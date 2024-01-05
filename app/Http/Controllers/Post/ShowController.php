<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;

class ShowController extends BaseController
{
    public function __invoke(Request $request, Post $post){
        $resType = $request->input('resoponse');

        $tags = $post->tags;
        $category = Category::find($post->category_id);
        
        //dd($resType );
        if($resType == 'api' ){
            return new PostResource($post, $category);
        }else{
            return view('post.show', compact('post', 'category', 'tags'));
        }
    }
}
