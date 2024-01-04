<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class DeleteController extends BaseController
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
    public function __invoke(Post $post){
        $post->delete();
        return redirect()->route('posts.index');
    }
}
