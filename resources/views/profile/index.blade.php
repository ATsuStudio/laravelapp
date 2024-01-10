@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card">
                <div class="card-header">Peoples</div>
                <div class="card-body">
                    <div class="row">
                        @include('blocks.sidebar')

                        <div class="my-3 p-3 bg-white rounded box-shadow col-md">
                            @foreach ($profiles as $key => $profile)
                                <div class="row text-muted pt-3">
                                    <div class="col-sm-1">
                                        <img alt="32x32" class="mr-2 rounded"
                                            src="{{ isset($profile->logo) ? asset('storage/' . $profile->logo) : asset('storage/images/resources/default_avatar.jpg') }}"
                                            data-holder-rendered="true" style="width: 45px; height: 45px;">
                                    </div>

                                    <div class="col-sm">
                                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray ">
                                            <a href=" {{ route('profiles.show', $profile->user_id) }} ">
                                                <strong class="d-block text-gray-dark">{{ $profile->first_name }}
                                                    {{ $profile->second_name }}</strong>
                                            </a>
                                            {{ $profile->bio }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            <small class="d-block text-right mt-3">
                                <div>
                                    {{ $profiles->withQueryString()->links() }}
                                </div>
                            </small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
