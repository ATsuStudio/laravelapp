@extends('layouts.index')
@section('main')

<main>
    <div class="container">
    <h1>Edit profile</h1>
    
    @if($is_own)
    <form action="{{ route( 'profiles.update', $profile->user_id) }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="col-12">
          <label for="content"  class="form-label">Avatar</label>

          <div class="input-group mb-3">
            <input type="file" class="form-control" name="logo" id="inputFile">
            <label class="input-group-text" accept="image/png, image/gif, image/jpeg"  for="inputGroupFile02">Upload</label>
          </div>

          <figure class="figure">
            <img src="{{ asset('storage/' . $profile->logo) }}" class="figure-img img-fluid col-md-5 rounded"  id="preview-output" alt="">
          </figure>

          <div class="invalid-feedback">
            Please enter your avatar.
          </div>
        </div>


        <div class="col-12">
            <label for="title"  class="form-label">First name</label>
            <input type="text" class="form-control" id="title"  name="first_name" placeholder="name" required="" value="{{$profile->first_name}}">
            <div class="invalid-feedback">
              Please enter your First name.
            </div>
        </div>

        
        <div class="col-12">
          <label for="title"  class="form-label">Second name</label>
          <input type="text" class="form-control" id="title"  name="second_name" placeholder="surname" required="" value="{{$profile->second_name}}">
          <div class="invalid-feedback">
            Please enter your Second name.
          </div>
        </div>

        <div class="col-12">
          <label for="content"  class="form-label">Bio</label>
          <textarea type="text" class="form-control" id="title" name="bio" placeholder="about you">{{$profile->bio}}</textarea>
          <div class="invalid-feedback">
            Please enter your Bio.
          </div>
        </div>
        
        <div class="col-12">
          <label for="title"  class="form-label">Birth</label>
          <input type="date" class="form-control" id="title"  name="birth" placeholder="burn date" value="{{$profile->birth}}">
          <div class="invalid-feedback">
            Please enter your Birth.
          </div>
        </div>
        

        <div class="col-12">
          <label for="title"  class="form-label">Gender</label>
          <input type="text" class="form-control" id="title"  name="gender" placeholder="male, female" value="{{$profile->gender}}">
          <div class="invalid-feedback">
            Please enter your Gender.
          </div>
        </div>

        <div class="col-12 mt-2">
          <button class="btn btn-success" type="submit">Save</button>
          <a class="btn btn-secondary" href="{{ route('profiles.show', $profile->user_id) }}">Cancel</a>
        </div>
    </form>

    @else
    <div class="alert alert-danger" role="alert">
      You don't have permission to edit!
    </div>
    @endif

    </div>
    
</main>

@endsection