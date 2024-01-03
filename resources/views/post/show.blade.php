@extends('layouts.index')
@section('main')

<main>
    <div class="container">
    <h1>Post: {{ $post->title }}</h1>
    <p>content: {{ $post->content }}</p>
    <p>thumbnail: {{ $post->thumbnail }}</p>
    <p>likes: {{ $post->likes }}</p>
    <p>is_published: {{ $post->is_published }}</p>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <a class="btn btn-primary mb-2" href="{{ route('posts.edit', $post->id) }}">Edit</a>
        <form action="{{route('posts.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
    
    </div>
</main>

@endsection
