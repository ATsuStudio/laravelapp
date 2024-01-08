@extends('layouts.index')
@section('main')

<main>
    <div class="container">
    <h1>Edit post</h1>
    {{-- <form action="{{ route('posts.update', $post->id)}}" method="patch"> --}}
    <form action="{{ route( 'posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="col-12">
            <label for="title"  class="form-label">Title</label>
            <input type="text" class="form-control" id="title"  name="title" placeholder="Some title" required="" value="{{$post->title}}">
            <div class="invalid-feedback">
              Please enter your title.
            </div>
        </div>

        
        <div class="col-12">
            <label for="content"  class="form-label">Content</label>
            <textarea type="text" class="form-control" id="title" name="content" placeholder="Some content" required="">{{$post->content}}</textarea>
            <div class="invalid-feedback">
              Please enter your title.
            </div>
        </div>

        
        <div class="col-12">
            <label for="content"  class="form-label">Image</label>

           

            <div class="input-group mb-3">
              <input type="file" class="form-control" name="thumbnail" id="inputGroupFile02">
              <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            @if (asset('storage/' . $post->thumbnail))
              <figure class="figure">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="figure-img img-fluid col-md-5 rounded" alt="">
              </figure>
            @endif

            <div class="invalid-feedback">
              Please enter your thumbnail.
            </div>
        </div>






        <div class="col-12">
            <label for="content"  class="form-label">Likes</label>
            <input type="number" class="form-control" id="likes" name="likes" placeholder="Some likes" required="" value="{{$post->likes}}"">
            <div class="invalid-feedback">
              Please enter your likes.
            </div>
        </div>

        <div class="form-check">
            <input type="checkbox" name="is_published" class="form-check-input" id="same-address" 
            @if ($post->is_published == 1)
            checked
            @endif>
            <label class="form-check-label" for="same-address">It Publish</label>
          </div>

        <div class="col-md-5  mb-2">
          <label for="country" class="form-label">Select your category</label>
          <select class="form-select" id="category" name="category_id" required="">
              @foreach ($categories as $category)
                    <option 
                        {{ $category->id == $post->category_id ? "selected":"" }}
                    value="{{$category->id}}">{{$category->title}}</option>
              @endforeach
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>

        
        <div class="col-md-5  mb-2">
          <label for="country" class="form-label">Select your tag</label>
          <select class="form-select" multiple="" aria-label="multiple select example" name="tags[]">
            @foreach ($tags as $tag)

              {{ $is_selected = false }}

              @foreach ($selectedTags as $sTag)

                @if ($sTag->title == $tag->title)
                  <option class="rounded" selected value="{{$tag->id}}">{{$tag->title}}</option>
                  {{ $is_selected = true }}
                @endif
                
              @endforeach
              @if (!$is_selected)
                <option class="rounded" value="{{$tag->id}}">{{$tag->title}}</option>
              @endif

            @endforeach
          </select>
          <div class="invalid-feedback">
            Please select a tag.
          </div>



      </div>

        <button class="btn btn-success" type="submit">Save</button>
        <a class="btn btn-secondary" href="{{ route('posts.show', $post->id) }}">Cancel</a>



    </form>
    </div>
    
</main>

@endsection