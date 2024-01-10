@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">


            @if (session('create') == '1')
                <div class="alert alert-success">
                    Post was deleted successful
                </div>
            @elseif (session('create') == '0')
                <div class="alert alert-danger">
                    An error occurred while creating the post.
                </div>
            @endif

            
            @if (session('delete') == '1')
                <div class="alert alert-success">
                    Post was deleted successful
                </div>
            @elseif (session('delete') == '0')
                <div class="alert alert-danger">
                    An error occurred while deleting the post.
                </div>
            @endif



            <div class="card">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    <div class="row">
                        @include('blocks.sidebar')
                        <div class="col-md">

                            <section class="p-4 d-flex justify-content-center w-100">
                                <div class=" px-3 pt-3" style="max-width: 32rem">
                                    <!-- News block -->
                                    <div>
                                        <a class="btn btn-primary mb-2 " href="{{ route('posts.create') }}">Create new post</a>
                                        <div data-bs-spy="scroll"  data-bs-offset="0" class="scrollspy-example-2" tabindex="0">
                                            @foreach ($posts as $key => $post)

                                            <div class="card mb-2" style="width: 28rem;">
                                                <img class="card-img-top" src="{{ asset('storage/' . $post->thumbnail) }}" alt="Card image cap">
                                                <div class="card-body">
                                                  <h5  class="card-title"> {{ $post->title }}</h5>
                                                  <p class="card-text">{{ strlen( $post->content) >150? substr($post->content, 0, 150) . " ..." :  $post->content }}</p>
                                                  <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Go to post</a>
                                                </div>
                                              </div>
                                              
                                            @endforeach
                                        </div>
                                       
                                    </div>
                                </div>

                            </section>
                            <div>
                                {{ $posts->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
