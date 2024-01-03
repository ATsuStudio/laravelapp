@extends('layouts.index')
@section('main')

<main>
    <div class="container">
    <h1>Post: {{ $post->title }}</h1>
    <p>content: {{ $post->content }}</p>
    <p>thumbnail: {{ $post->thumbnail }}</p>
    <p>likes: {{ $post->likes }}</p>
    <p>is_published: {{ $post->is_published }}</p>
    <a class="btn btn-primary mb-2" href="{{ route('posts.edit', $post->id) }}">Edit</a>
    <form action="{{route('posts.delete', $post->id)}}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
    </div>
</main>

@endsection
