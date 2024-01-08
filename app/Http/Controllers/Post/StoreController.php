<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends BaseController
{

    public function __invoke(Request $req, StoreRequest $request){
        $resType = $req->input('resoponse');
        
        $this->middleware('admin');


        $data = $request->validated();
        
        $result = $this->_service->store($data);

        if($resType == 'api'){
            return $result? "Post created successful" : "Something went wrong";
        }else{
            return $result? redirect()->route('posts.index') : "Something went wrong";
        }
    }
}
