@extends('layouts.index')
@section('main')

<main>
    <div class="container">
    <h1>Post: {{ $post->title }}</h1>
    <div class="col-md-5  mb-2">
        <label class="text-muted">Content</label>
        <p class="bg-white rounded shadow-sm p-2">{{ $post->content }}</p>
    </div>

    <div class="col-md-5  mb-2">
        <label class="text-muted">Thumbnail</label>
        <p class="bg-white rounded shadow-sm p-2">{{ $post->thumbnail }}</p>
    </div>

    <div class="col-md-5  mb-2">
        <label class="text-muted">Likes</label>
        <p class="bg-white rounded shadow-sm p-2">{{ $post->likes }}</p>
    </div>

    <div class="col-md-5  mb-2">
        <label class="text-muted">Published</label>
        <p class="bg-white rounded shadow-sm p-2">{{ $post->likes ==1 ? 'Yes': 'No'}}</p>
    </div>

    <div class="col-md-5  mb-2">
        <label class="text-muted">Category</label>
        <p class="bg-white rounded shadow-sm p-2">{{ $category->title }}</p>
    </div>

    @if (count($tags) >0)
        <div class="col-md-5  mb-2">
            <label class="text-muted">Tags</label>
            @foreach ($tags as $tag)
                <p class="bg-white rounded shadow-sm p-2">{{ $tag->title }}</p>
            @endforeach        
        </div>
    @endif
    

    

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
