<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Post_reaction;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\StoreRequest;

class LikeController extends BaseController
{

    public function __invoke(Request $request, Post $post){
        $post_id = $post->id;
        $acc_user = $request['user_id'];
        $action = $request['action'];

        $post_likes = Post_reaction::updateOrCreate(
            [
                'post_id' => $post_id,
                'user_id' => $acc_user
            ],
            [
                'action' => $action
            ]
        );

        $liked_posts_count = Post_reaction::where('post_id', $post_id)->where('action', 1)->get();

        $post->likes = count($liked_posts_count);
        $post->save();

        return count($liked_posts_count);
    }
}
