<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Filters\PostFilter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;

class IndexController extends BaseController
{
    public function __invoke(Request $request, FilterRequest $filterRequest){
        $acc_user = Auth::user();
        $acc_profile = Profile::where('user_id', $acc_user->id)->first();


        $resType = $request->input('resoponse');
        $role = $request->input('user_role');

        $data = $filterRequest->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['perPage'] ?? 10;

        $data['acc_user'] = $acc_user;

        if($role != "admin"){
            $data['is_published'] =1;
        }


        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        

        if($resType == 'api' ){
            return PostResource::collection($posts);
        }else{
            return view('post.index', compact('posts', 'acc_user' , 'acc_profile'));
        }
    }
}
