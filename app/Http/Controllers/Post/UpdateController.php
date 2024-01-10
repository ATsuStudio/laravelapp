<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(Request $req, UpdateRequest $request, Post $post){
        $resType = $req->input('resoponse');
        $this->middleware('admin');

        $data = $request->validated();

        $result = $this->_service->update($post, $data);      
        
        if($resType == 'api'){
            return $result? "Post updated successful" : "Something went wrong";
        }else{
            return $result ? redirect()->route('posts.show',  $post->id)->with('update', '1') 
                            : redirect()->route('posts.show',  $post->id)->with('update', '0');
        }
    }
}
