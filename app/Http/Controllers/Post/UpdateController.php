<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post){
        $this->middleware('admin');

        $data = $request->validated();

        $result = $this->_service->update($post, $data);      
        
        return $result? "Post updated successful" : "Something went wrong";
        //return redirect()->route('posts.show',  $post->id);
    }
}
