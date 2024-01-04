<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request){
        
        $this->middleware('admin');


        $data = $request->validated();
        

        $this->_service->store( $data);

        
        return redirect()->route('posts.index');
    }
}
