<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'thumbnail' => $this->thumbnail,
            'likes' => $this->likes,
            'is_published' => $this->is_published,
            'category_id' =>$this->category_id,
            'tags' => $this->tags
        ];
    }
}
