@extends('layout.master')


@section('body')
<div class="container">
    <div class="card mt-5">
        <div class="card-header bg-dark text-light">
            Login
        </div>
        <div class="card-body">
            <form class="mr-5 ml-5" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">Email Address</label>
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

                <div class="form-group row mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                <button type="submit" class="btn btn-primary mt-3">Login</button>
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