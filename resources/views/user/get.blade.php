@extends('layout.master')

@section('body')    

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)      
    <tr>
    <th scope="row">{{ $loop->iteration }}</th>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>
        <form action="{{ route('delete_user', ['id'=>$user->id]) }}" method="POST">
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