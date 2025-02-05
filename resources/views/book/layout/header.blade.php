<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <a class="navbar-brand" href="https://www.facebook.com/steven.h.sofa"> Logo </a>
        <ul class="navbar-nav">
            <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{request()->is('books/create') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('create')}}">Create Book</a>
            </li>
            <li class="nav-item {{request()->is('books/list') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('list')}}">List Books</a>
            </li>
        </ul>
        <form class="form-inline" action="/action_page.php" style="position: absolute; right: 1%;">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-success" type="submit">Search</button>
        </form>
    </nav>
</header>