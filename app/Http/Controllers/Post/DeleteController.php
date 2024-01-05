<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function __invoke(Request $request, Post $post){
        $resType = $request->input('resoponse');
        
        $post->delete();

        if($resType == 'api'){
            return "Post deleted successful";
        }else{
            return redirect()->route('posts.index');
        }
    }
}
