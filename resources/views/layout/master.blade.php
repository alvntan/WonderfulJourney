<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Wonderful Journey</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  @yield('head')
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Wonderful Journey</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        @if (Auth::check() == true)
        @if (Auth::user()->role == 'ADMIN')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('get_user')}}">View User</a>
        </li>
        @endif
        @if (Auth::user()->role == 'MEMBER')
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('update_page') }}">Profile</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('get_article') }}">Blog</a>
          </li>
        @endif
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-dark text-secondary" type="submit">Logout</button>
          </form>
        </li>
        @else
         <li class="nav-item">
            <a class="nav-link" href="{{ route('signup_page') }}">Sign Up</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login_page') }}">Login</a>
        </li>
       </div>
        @endif
      </ul>
    </div>
  </nav>

  @yield('body')
</body>

</html>