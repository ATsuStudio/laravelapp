<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'thumbnail' => 'string',
            'likes' => '',
            'is_published' => '',
            'category_id' =>'',
            'tags' =>''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $data['is_published'] = isset($data['is_published'])? 1:0;
        $post = Post::create($data);

        $post->tags()->attach($tags);
        // foreach ($tags as $key => $tag) {
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id
        //     ]);
        // }
        return redirect()->route('posts.index');
    }
}
