@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">

                <div class="card-header">Home</div>

                <div class="card-body">
                    <div class="row">
                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                            <a href="/"
                                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                                <svg class="bi me-2" width="40" height="32">
                                    <use xlink:href="#bootstrap"></use>
                                </svg>
                                <span class="fs-4">Sidebar</span>
                            </a>
                            <hr>
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active" aria-current="page">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('posts.index') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#speedometer2"></use>
                                        </svg>
                                        Posts
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('about.index') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#table"></use>
                                        </svg>
                                        About
                                    </a>
                                </li>
                            </ul>
                            <hr>
                            <div class="dropdown">
                                <a href="#"
                                    class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                                    id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">

                                    <img src="{{ isset($profile->logo) ? asset('storage/' . $profile->logo) : asset('storage/images/resources/default_avatar.jpg') }}"
                                        alt="" width="32" height="32" class="rounded-circle me-2">

                                    <strong>{{ isset($profile) ? $profile->first_name : $user->name }}</strong>
                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                    <li><a class="dropdown-item"
                                            href=" {{ route('profiles.show', $user->id) }} ">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        
                        <div class="col-md-4">
                            <h2>Profile</h2>
                            <p>A collection of personal details about oneself that one curates and shares on an online platform such as a blog or a social media service </p>
                            <p><a class="btn btn-secondary" href="{{ route('profiles.show', $user->id) }} " role="button">View details »</a></p>
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
