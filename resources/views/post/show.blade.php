@extends('layouts.index')
@section('main')

    <main>
        <div class="container">
            <a class="btn btn-light mt-2 mb-2" href="{{ route('posts.index') }}">
                <svg aria-hidden="true" height="25" width="25" viewBox="0 0 16 16" version="1.1" transform="rotate(90)">
                    <path fill="black"
                        d="M12.78 5.22a.749.749 0 0 1 0 1.06l-4.25 4.25a.749.749 0 0 1-1.06 0L3.22 6.28a.749.749 0 1 1 1.06-1.06L8 8.939l3.72-3.719a.749.749 0 0 1 1.06 0Z">
                    </path>
                </svg>
            </a>


            @if (session('edit') == '0')
                <div class="alert alert-danger">
                    Your account no have permission!
                </div>
            @endif

            
            @if (session('update') == '1')
                <div class="alert alert-success">
                    Post was updated successful
                </div>
            @elseif (session('update') == '0')
                <div class="alert alert-danger">
                    An error occurred while updating the post.
                </div>
            @endif


            <div class="d-flex d-flex-row">
                <strong style="color:rgb(255, 136, 0); font-size: 1.3rem" >#</strong><strong style="font-size: 1.3rem">{{ $category->title }}</strong>
            </div>

            @if (count($tags) > 0)
                <div class="col-md-5  mb-2">
                    @foreach ($tags as $tag)
                        <span class="badge rounded-pill bg-info text-dark p-1">{{ $tag->title }}</span>
                    @endforeach
                </div>
            @endif


            <h1 class="fw-bold">{{ $post->title }}</h1>

            <div class="d-flex d-flex-row">
                <p class="bg-white rounded shadow-sm">{{ $author->name }}</p>
                <p class="p-1"></p>
                <p class="bg-white rounded shadow-sm">{{  date("d-m-Y", strtotime($post->created_at)) }} </p>
            </div>


            <figure style="margin: 0;" class="figure">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="figure-img img-fluid col-md-5 rounded"
                    alt="">
            </figure>



            <div class="d-flex justify-content-between align-items-center col-md-5  mb-2">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-success" id="btn-like" post="{{ $post->id }}" acc_user="{{$acc_user->id}}" >Like</button>
                    
                    @if ($post->author == $acc_user->id)
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form  action="{{ route('posts.delete', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                        </form>
                    @endif  
                </div>
                <small class="text-muted" >{{ $post->likes }} likes</small>
            </div>



            <div class="col-md-5  mb-2">
                <label class="text-muted">Content</label>
                <p class="bg-white rounded shadow-sm p-2">{{ $post->content }}</p>
            </div>



        </div>
    </main>

@endsection
