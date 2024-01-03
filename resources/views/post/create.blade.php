@extends('layouts.index')
@section('main')

<main>
    <div class="container">
        <h1>Create post</h1>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="col-12">
                <label for="title"  class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Some title" required="">
                <div class="invalid-feedback">
                  Please enter your title.
                </div>
            </div>

            
            <div class="col-12">
                <label for="content"  class="form-label">Content</label>
                <textarea type="text" class="form-control" id="title" name="content" placeholder="Some content" required=""></textarea>
                <div class="invalid-feedback">
                  Please enter your Content.
                </div>
            </div>

            
            <div class="col-12">
                <label for="content"  class="form-label">Image path</label>
                <input type="text" class="form-control" id="title" name="thumbnail" placeholder="Some path" required="">
                <div class="invalid-feedback">
                  Please enter your Image path.
                </div>
            </div>

            <div class="col-12">
                <label for="content"  class="form-label">Likes</label>
                <input type="number" class="form-control" id="likes" name="likes" placeholder="Some likes" required="">
                <div class="invalid-feedback">
                  Please enter your likes.
                </div>
            </div>

            <div class="form-check">
                <input type="checkbox" name="is_published" class="form-check-input" id="same-address">
                <label class="form-check-label" for="same-address">It Publish</label>
            </div>

            <div class="col-md-5  mb-2">
              <label for="country" class="form-label">Select your category</label>
              <select class="form-select" id="category" name="category_id" required="">
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->title}}</option>
                  @endforeach
              </select>
              <div class="invalid-feedback">
                Please select a category.
              </div>
            </div>


            <div class="col-md-5  mb-2">
                <label for="country" class="form-label">Select your tag</label>
                <select class="form-select" multiple="" aria-label="multiple select example" name="tags[]">
                    @foreach ($tags as $tag)
                      <option class="rounded" value="{{$tag->id}}">{{$tag->title}}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Please select a tag.
                </div>
            </div>


            <button class="btn btn-success" type="submit">Create</button>
            <a class="btn btn-secondary" href="{{ route('posts.index') }}">Cancel</a>
        </form>


        









    </div>
</main>
@endsection

