@extends('layout.master')

@section('body')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-dark text-light">
                Sign Up
            </div>
            <div class="card-body">
                <form class="mr-5 ml-5" action="{{ route('signup') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="email" class="col-md-2 col-form-label">Email address</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="password" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="password_confirmation" class="col-md-2 col-form-label">Confirm Password</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="address" class="col-md-2 col-form-label">Address</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="phone" class="col-md-2 col-form-label">Phone number</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Register</button>
                </form>
            </div>
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
    </div>
@endsection
