@extends('layout.master')

@section('body')    
<a href="{{ route('create_article_page')}}" class="btn btn-secondary text-info mx-4 mt-3">
    + Create Blog
</a>
<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($articles as $article)      
    <tr>
    <th scope="row">{{ $loop->iteration }}</th>
    <td>{{$article->title}}</td>
    <td>
        <form action="{{ route('delete_article', ['id'=>$article->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">DELETE</button>
        </form>
    </td>
    </tr>
    @endforeach
    </tbody>
  </table>

  @endsection