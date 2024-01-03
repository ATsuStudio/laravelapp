@extends('layouts.index')
@section('main')

<main>
    <div class="container">
        <a class="btn btn-light mt-2 mb-2" href="{{ route('posts.index') }}">⟨</a>
        
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
                    <span class="badge rounded-pill bg-info text-dark p-1">{{ $tag->title }}</span>
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
