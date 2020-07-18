@extends('admin.template.master')

@section('page-title','tags')
@section('content')
<!-- start of content -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $tag->id ? 'Edit '.$tag->title : 'Create new tag'}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ $tag->id ? route('admin.tags.update', $tag->id) : route('admin.tags.store') }}">
       @csrf
       @if($tag->id)
        @method('put')
       @endif
      <div class="card-body">

        {{-- @if($errors->any())
        <div class="callout callout-danger">
            <h5>Form Errors!</h5>
            <ul  class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" value="{{ old('title') ? old('title') : $tag->title }}" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title">
          @error('title')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
            <label for="title">Slug</label>
            <input type="text" value="{{ old('slug') ? old('slug') : $tag->slug }}" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Enter slug">
            @error('slug')
              <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text"  class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Enter description">{{ old('description') ? old('description') : $tag->description }}</textarea>
            @error('description')
              <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>


        <div class="form-group">
            <label for="keywords">Keywords</label>
            <textarea type="text" name="keywords"  class="form-control @error('keywords') is-invalid @enderror" id="keywords" placeholder="Enter keywords">{{ old('keywords') ? old('keywords') : $tag->keywords }}</textarea>
            <small id="keywordsHelp" class="form-text text-muted">keyword1,keyword2,keyword3,keyword4</small>
            @error('keywords')
              <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>



      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-secondary float-right">Submit</button>
      </div>
    </form>
  </div>
<!-- end of content -->

@endsection
