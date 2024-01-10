@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">

                <div class="card-header">Home</div>

                <div class="card-body">
                    <div class="row">
                        @include('blocks.sidebar')


                        
                        <div class="col-md-4">
                            <h2>Profile</h2>
                            <p>A collection of personal details about oneself that one curates and shares on an online platform such as a blog or a social media service </p>
                            <p><a class="btn btn-secondary" href="{{ route('profiles.show', $acc_user->id) }} " role="button">View details »</a></p>
                        </div>

                        <div class="col-md-4">
                          <h2>Post</h2>
                          <p>Definition of a blog post The blog post is an entry (article) that you write on a blog. It can include content in the form of text, photos, infographics, or videos.</p>
                          <p><a class="btn btn-secondary" href="{{route('posts.index')}}" role="button">View details »</a></p>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
