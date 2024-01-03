<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::find(2);
        dd($posts->tags);
        return view('post.index', compact('posts'));


    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories','tags'));
    }

    public function store(){
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

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        return view('post.edit', compact('post','categories'));
    }

    public function update(Post $post){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'thumbnail' => 'string',
            'likes' => '',
            'is_published' => '',
            'category_id' =>''
        ]);
        $data['is_published'] = isset($data['is_published'])? 1:0;
        $post->update($data);
        return redirect()->route('posts.show',  $post->id);
    }

    public function delete(Post $post){
        $post->delete();
        var_dump("deleted");
        return redirect()->route('posts.index');
    }
}
