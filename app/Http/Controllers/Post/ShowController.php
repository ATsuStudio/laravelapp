<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post\PostResource;
use App\Http\Controllers\Post\BaseController;

class ShowController extends BaseController
{
    public function __invoke(Request $request, Post $post){
        $acc_user = Auth::user();

        $resType = $request->input('resoponse');

        $tags = $post->tags;
        $author = User::where('id', $post->author)->first();
        $category = Category::find($post->category_id);
        
        //dd($resType );
        if($resType == 'api' ){
            return new PostResource($post);
        }else{
            return view('post.show', compact('post', 'category', 'tags', 'acc_user', 'author'));
        }
    }
}
