@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
            
                <div class="card-header">Home</div>

                <div class="card-body">
                    
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                          <span class="fs-4">Sidebar</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                          <li class="nav-item">
                            <a href="#" class="nav-link active" aria-current="page">
                              <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                              Home
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('posts.index') }}" class="nav-link link-dark">
                              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                              Posts
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('about.index') }}" class="nav-link link-dark">
                              <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                              About
                            </a>
                          </li>
                        </ul>
                        <hr>
                        <div class="dropdown">
                          <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ isset($profile) ? $profile->first_name: $user->name}}</strong>
                          </a>
                          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href=" {{ route('profiles.index', $user->id) }} ">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
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
            

                </div>
            </div>
    </div>
</div>
@endsection
