<html>
<head>
    @include('components.head')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">AppVigi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a href="{{ url('categories') }}" class="nav-link" aria-current="page">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('authors') }}" class="nav-link" aria-current="page">Authors</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('books') }}" class="nav-link" aria-current="page">Books</a>
                    </li>
                    @if(auth()->user())
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link" aria-current="page">Jusu {{ auth()->user()->name }} profilis</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <!-- Reikia logikos kad jeigu prisijugęs rašytu logout, jeigu atsijunges rašytų login-->
                        @if(auth()->user() === null)
                            <a href="{{ route('login') }}" class="nav-link" aria-current="page">Login</a>
                        @else
                            <a href="{{ route('logout') }}" class="nav-link" aria-current="page">Logout</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer class="container">
        &copy 2023 Vigi App
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
