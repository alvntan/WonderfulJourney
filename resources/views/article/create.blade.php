@extends('layout.master')


@section('body')
<div class="container bg-white">
    <h1>Create Blog</h1>
    <form enctype="multipart/form-data" action="{{ route('create_article') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        {{-- <select class="form-select mt-3" aria-label="category">
            <option selected>Category</option>
            <option value="1">Beach</option>
            <option value="2">Mountain</option>
          </select> --}}
        <div class="form-group mt-3">
            <label for="category">Category</label>
            <input type="text" class="form-control" name="category">
        </div>
        <div class="form-group mt-3">
            <label for="img">Photo</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group mt-3">
            <label for="description">Story</label>
            <input type="text" class="form-control" name="description">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</div>
@endsection