@extends('layouts.index')
@section('main')

    <main>
        <div class="container">
            <a class="btn btn-light mt-2 mb-2" href="/">
                <svg aria-hidden="true" height="25" width="25" viewBox="0 0 16 16" version="1.1" transform="rotate(90)">
                    <path fill="black"
                        d="M12.78 5.22a.749.749 0 0 1 0 1.06l-4.25 4.25a.749.749 0 0 1-1.06 0L3.22 6.28a.749.749 0 1 1 1.06-1.06L8 8.939l3.72-3.719a.749.749 0 0 1 1.06 0Z">
                    </path>
                </svg>
            </a>

            @if (session('delete') == '1')
                <div class="alert alert-success">
                    Profile was deleted successful
                </div>
            @elseif (session('delete') == '0')
                <div class="alert alert-danger">
                    An error occurred while deleting the profile.
                </div>
            @endif


            @if (session('create') == '1')
                <div class="alert alert-success">
                    Profile was created successful
                </div>
            @elseif (session('create') == '0')
                <div class="alert alert-danger">
                    An error occurred while creating the profile.
                </div>
            @endif


            @if (session('update') == '1')
                <div class="alert alert-success">
                    Profile was updated successful
                </div>
            @elseif (session('update') == '0')
                <div class="alert alert-danger">
                    An error occurred while updating the profile.
                </div>
            @endif


            <h1>Profile</h1>


            @if ($profile != false)
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{ isset($profile->logo) ? asset('storage/' . $profile->logo) : asset('storage/images/resources/default_avatar.jpg') }}"
                                    alt="avatar" class="rounded-circle me-2" style="width: 150px; aspect-ratio: 1/1;">
                                <h5 class="my-3">{{ '@' . $username }}</h5>
                                <p class="text-muted mb-1">{{ $profile->bio }}</p>
                                <p class="text-muted mb-4">{{ $profile->birth }}</p>


                                @if ($profile->user_id == $auth_id)

                                    <div class="row p-2">
                                        <a class="btn btn-primary mb-2 col-sm"
                                            href="{{ route('profiles.edit', $user_id) }}">Edit</a>

                                        <form action="{{ route('profiles.delete', $user_id) }}" class="col-3" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger col-sm" type="submit">Delete</button>
                                        </form>

                                    </div>

                                @endif
                                
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $profile->first_name }} {{ $profile->second_name }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $useremail }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Birth</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $profile->birth }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $profile->gender }}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Account</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ '@' . $username }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                
            @elseif($user_id == $auth_id)
                <div class="col-md-5  mb-2">
                    <label class="text-muted">Your account not have profile</label>
                    <a class="btn btn-success mb-2" href="{{ route('profiles.create', $user_id) }}">Create</a>
                    <a class="btn btn-secondary mb-2" href="/">Cansel</a>

                </div>
            @endif


        </div>
    </main>

@endsection
