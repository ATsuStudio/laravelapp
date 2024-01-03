<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        
        $this->_service->store($data);
        
        
        return redirect()->route('posts.index');
    }
}
