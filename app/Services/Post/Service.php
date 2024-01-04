<?php

namespace App\Services\Post;

use App\Models\Post;

class Service{

    public function store($data){
        $tags = $data['tags'];
        unset($data['tags']);

        $data['is_published'] = isset($data['is_published'])? 1:0;
        $post = Post::create($data);

        $post->tags()->attach($tags);
    }



    public function update($post, $data){
        dd($post, $data);
        $tags = $data['tags'];
        unset($data['tags']);

        $data['is_published'] = isset($data['is_published'])? 1:0;
        $post->update($data);

        $post->tags()->sync($tags);
    }
    
    public function test(){
        dd('test');
    }
}