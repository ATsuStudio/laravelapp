@extends('layouts.index')
@section('main')

<main>
    <div class="container">
    <h1>Create profile</h1>
    
    @if($is_own)
    <form action="{{ route( 'profiles.store', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="col-12">
          <label for="content"  class="form-label">Avatar</label>

          <div class="input-group mb-3">
            <input type="file" class="form-control" name="logo" id="inputFile">
            <label class="input-group-text" accept="image/png, image/gif, image/jpeg"  for="inputGroupFile02">Upload</label>
          </div>

          <figure class="figure">
            <img src="" class="figure-img img-fluid col-md-5 rounded"  id="preview-output" alt="">
          </figure>

          <div class="invalid-feedback">
            Please enter your avatar.
          </div>
        </div>


        <div class="col-12">
            <label for="title"  class="form-label">First name</label>
            <input type="text" class="form-control" id="title"  name="first_name" placeholder="name" required="">
            <div class="invalid-feedback">
              Please enter your First name.
            </div>
        </div>

        
        <div class="col-12">
          <label for="title"  class="form-label">Second name</label>
          <input type="text" class="form-control" id="title"  name="second_name" placeholder="surname" required="" >
          <div class="invalid-feedback">
            Please enter your Second name.
          </div>
        </div>

        <div class="col-12">
          <label for="content"  class="form-label">Bio</label>
          <textarea type="text" class="form-control" id="title" name="bio" placeholder="about you"></textarea>
          <div class="invalid-feedback">
            Please enter your Bio.
          </div>
        </div>
        
        <div class="col-12">
          <label for="title"  class="form-label">Birth</label>
          <input type="date" class="form-control" id="title"  name="birth" placeholder="burn date">
          <div class="invalid-feedback">
            Please enter your Birth.
          </div>
        </div>
        

        <div class="col-12">
          <label for="title"  class="form-label">Gender</label>
          <input type="text" class="form-control" id="title"  name="gender" placeholder="male, female" >
          <div class="invalid-feedback">
            Please enter your Gender.
          </div>
        </div>

        <div class="col-12 mt-2">
          <button class="btn btn-success" type="submit">Create</button>
          <a class="btn btn-secondary" href="/">Cancel</a>
        </div>
    </form>

    @else
    <div class="alert alert-danger" role="alert">
      You don't have permission to create profile for this user!
    </div>
    @endif

    </div>
    
</main>

@endsection