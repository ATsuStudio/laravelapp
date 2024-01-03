<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $filterRequest){
        $data = $filterRequest->validated();
        
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(18);

        return view('post.index', compact('posts'));
    }
}
