<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{

    public function __invoke(Request $req, StoreRequest $request){
        $resType = $req->input('resoponse');
        
        $acc_user = Auth::user();

        $this->middleware('admin');


        $data = $request->validated();
        
        $result = $this->_service->store($data, $acc_user);

        if($resType == 'api'){
            return $result? "Post created successful" : "Something went wrong";
        }else{
            return $result ? redirect()->route('posts.index')->with('create', '1') 
                            : redirect()->route('posts.index')->with('create', '0');
        }
    }
}
