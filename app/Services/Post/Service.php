<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function store($data)
    {

        try {
            DB::beginTransaction(); 
            
            if(isset($data['thumbnail'])){
                $fileObj = $data['thumbnail'];
                $filename = $fileObj->getClientOriginalName();
                $imagePath = $fileObj->storeAs('public/images/thumbnails/' . date("Y-m-d"), rand(1000, 9999) . '_'. $filename);
                $data['thumbnail'] = str_replace("public/", "", $imagePath);
            }

            if(isset($data['tags'])){
                $tags = $data['tags'];
                unset($data['tags']);
            }
            else{
                $tags = [];
            }
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

            if(isset($data['thumbnail'])){
                $fileObj = $data['thumbnail'];
                $filename = $fileObj->getClientOriginalName();
                $imagePath = $fileObj->storeAs('public/images/thumbnails/' . date("Y-m-d"), rand(1000, 9999) . '_'. $filename);
                $data['thumbnail'] = str_replace("public/", "", $imagePath);
            }

            if(isset($data['tags'])){
                $tags = $data['tags'];
                unset($data['tags']);
            }
            else{
                $tags = [];
            }


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
