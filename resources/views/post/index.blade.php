@extends('layouts.index')
@section('main')

<div class="container">
    <h1 class="mt-2">Posts</h1>
    @can('view', auth()->user())
        <a class="btn btn-primary mb-2" href="{{ route('posts.create') }}">Create new post</a>
    @endcan
    <ul class="list-group list-group-flush mb-2">
        @foreach($posts as $key => $post)
            <li class="list-group-item">
                <a class="nav-link" href="{{ route('posts.show', $post->id) }}">{{ (($posts->currentPage() - 1 ) * $posts->perPage() ) + $key + 1 }}. {{ $post->title }}
                <span class="badge {{ $post->is_published == 1? "bg-primary": "bg-dark" }} ">{{ $post->is_published == 1? "Public": "Private" }}</span></a>
            </li>
        @endforeach
    </ul>
    <div>
        {{ $posts->withQueryString()->links() }}
    </div>
   
</div>
@endsection
