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
  <nav class="navbar navbar-expand-sm fixed-top" style=" background-color:#123;">
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
        <h2>Library </h2>
      </li>

      <li>
        <a href="/" class="d-flex align-items-center text-decoration-none">
          <i class="fas fa-home me-2"></i>
          <p class="mb-0">Home</p>
        </a>
      </li>

      <li>
        <a href="/books/list" class="d-flex align-items-center text-decoration-none">
          <i class="fa-solid fa-book me-2"></i>
          <p class="mb-0">Books</p>
        </a>
      </li>

      <li>
        <a href="/authors/list" class="d-flex align-items-center text-decoration-none">
          <i class="fa-solid fa-user me-2"></i>
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
          <i class="fa-solid fa-directions me-2"></i>
          <p class="mb-0">Categories</p>
        </a>
      </li>

    </ul>
  </div>

  <div class="content" style="margin-top: 60px; margin-left: 125px;">
    @yield('my-body')
  </div>
  @include('layout.footer')

</body>

</html>