<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('layout.header')
  <title>Laravel Library</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm fixed-top" style="background-color:rgba(17, 34, 51, 0.916);">
    <form class="d-flex ms-auto" action="" method="GET">
      <input class="form-control me-2" type="text" name="query" placeholder="Search" value="{{ request('query') }}">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  </nav>

  <div class="menu">
    <ul>
      <li class="profile ">
        <div class="img-box">
          <img src="{{asset('assets/files/1739288672.JPG')}}" alt="profile" />
        </div>
        <h2>{{ Auth::user()->name ?? "Guest" }} </h2>
      </li>

      <li>
        <a href="/" class="d-flex align-items-center text-decoration-none">
          <i class="fas fa-home me-2"></i>
          <p class="mb-0">Home</p>
        </a>
      </li>

      <li>
        <a href="/books/list" class="d-flex align-items-center text-decoration-none">
          <i class="fa-solid fa-book me-3"></i>
          <p class="mb-0">Books</p>
        </a>
      </li>

      <li>
        <a href="/authors/list" class="d-flex align-items-center text-decoration-none">
          <i class="fa-solid fa-user-pen me-2"></i>
          <p class="mb-0">Authors</p>
        </a>
      </li>

      <li>
        <a href="/students/list" class="d-flex align-items-center text-decoration-none">
          <i class="fa-solid fa-users me-2"></i>
          <p class="mb-0">Students</p>
        </a>
      </li>

      <li>
        <a href="/categories/list" class="d-flex align-items-center text-decoration-none">
          <i class="fa-solid fa-directions me-3"></i>
          <p class="mb-0">Categories</p>
        </a>
      </li>

      <div style="padding-top: 120px; position: absolute;">

        @guest
      <li>
        <a href="/auth/login" class="d-flex align-items-center text-decoration-none">
        <i class="fa-solid fa-right-to-bracket me-3"></i>
        <p class="mb-0">SignIn</p>
        </a>
      </li>

      <li>
        <a href="/auth/register" class="d-flex align-items-center text-decoration-none">
        <i class="fa-solid fa-user-plus me-2"></i>
        <p class="mb-0">SignUp</p>
        </a>
      </li>
    @endguest
      </div>

      <div style="padding-top: 180px; position: absolute;">
        @auth
      <li>
        <a href="/auth/logout" class="d-flex align-items-center text-decoration-none">
        <i class="fa-solid fa-right-from-bracket me-3"></i>
        <p class="mb-0">SignOut</p>
        </a>
      </li>
    @endauth
      </div>

    </ul>
  </div>

  <div class="content" style="margin-top: 60px; margin-left: 125px;">
    @yield('my-body')
  </div>
  @include('layout.footer')


  @if(session('alert'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast show align-items-center text-white bg-danger border-0" role="alert">
      <div class="d-flex">
      <div class="toast-body">
        {{ session('alert') }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
    </div>
  @endif

</body>

</html>