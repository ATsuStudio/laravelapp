@extends('layouts.index')
@section('main')

<div class="container">
    <h1 class="mt-2">Posts</h1>
    <a class="btn btn-primary mb-2" href="{{ route('posts.create') }}">Create new post</a>
    <ul class="list-group mb-2">
        @foreach($posts as $key => $post)
            <li class="list-group-item">
                <a href="{{ route('posts.show', $post->id) }}">{{ (($posts->currentPage() - 1 ) * $posts->perPage() ) + $key + 1 }}. {{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
    <div>
        {{ $posts->links() }}
    </div>
   
</div>
@endsection
