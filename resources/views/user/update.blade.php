@extends('layout.master')

@section('body')
<div class="card-body">
    <form class="mr-5 ml-5" action="{{ route('update') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>
        <div class="form-group row mt-2">
            <label for="email" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-10">
                <input type="email" class="form-control" name="email" id="email">
            </div>
        </div>
        <div class="form-group row mt-2">
            <label for="phone" class="col-md-2 col-form-label">Phone</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="phone" id="phone">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
</div>


@endsection