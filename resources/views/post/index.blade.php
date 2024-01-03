@extends('layouts.index')
@section('main')

<div class="container">
<h1 class="mt-2">Posts</h1>
<a class="btn btn-primary mb-2" href="{{ route('posts.create') }}">Create new post</a>
<ul class="list-group">
    @foreach($posts as $key => $post)
        <li class="list-group-item">
            <a href="{{ route('posts.show', $post->id) }}">{{$key+1}}. {{ $post->title }}</a>
        </li>
    @endforeach
</ul>
</div>
@endsection
