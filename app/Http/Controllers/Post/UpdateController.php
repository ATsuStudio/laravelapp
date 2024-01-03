<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(Post $post){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'thumbnail' => 'string',
            'likes' => '',
            'is_published' => '',
            'category_id' =>''
        ]);
        $data['is_published'] = isset($data['is_published'])? 1:0;
        $post->update($data);
        return redirect()->route('posts.show',  $post->id);
    }
}
