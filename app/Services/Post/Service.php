<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class Service
{

    public function store($data)
    {

        try {
            DB::beginTransaction(); 

            $tags = $data['tags'];
            unset($data['tags']);

            $data['is_published'] = isset($data['is_published']) ? 1 : 0;
            $post = Post::create($data);

            $post->tags()->attach($tags);
            
            DB::commit();
            return $post;
        } catch (\Throwable $th) {
            return false;
        }
    }



    public function update($post, $data)
    {
        try {
            DB::beginTransaction();

            $tags = $data['tags'];
            unset($data['tags']);

            $data['is_published'] = isset($data['is_published']) ? 1 : 0;
            $post->update($data);

            $post->tags()->sync($tags);

            DB::commit();
            return $post;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
