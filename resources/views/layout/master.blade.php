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

    </ul>
  </div>

  <div class="content">
    @yield('my-body')
  </div>
  @include('layout.footer')
</body>

</html>