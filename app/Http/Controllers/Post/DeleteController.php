<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Request $request, Post $post){
        $resType = $request->input('resoponse');
        $is_deleted = true;
        try {
            $post->delete();
        } catch (\Throwable $th) {
            $is_deleted= false;
        }

        if($resType == 'api'){
            return "Post deleted successful";
        }else{
            return $is_deleted ? redirect()->route('posts.index')->with('delete', '1') 
                                : redirect()->route('posts.index')->with('delete', '0');
        }
    }
}
