<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Crud App</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
@auth
<header>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/assets/img/laravel_icon_1.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
                    Product App
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-dark border-0" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-white" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider bg-light"></li>
                                <li>
                                    <form action="/logout" method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-white">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
</header>
<body class="page">
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-3 col-lg-2 bg-dark sidebar text-white d-flex flex-column mt-5" >
                <ul class="nav flex-column mb-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/category">Category Listing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Create
                        </a>
                        <ul class="dropdown-menu bg-dark border-0 ms-1">
                            <li><a class="nav-link" href="/product/create">Create Product</a></li>
                            <li><a class="nav-link" href="/category/create">Create Category</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <main class="col-md-9 col-lg-10 main-content">
                <div class="container mt-5">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
@endauth

@guest
<body class="page">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">
                <img src="/assets/img/laravel_icon_1.jpg" width="30" height="30" class="d-inline-block align-top"
                    alt="">
                Product App
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li>
                        <div class="btn-group" role="group" aria-label="Auth">
                            <a href="/register" class="btn btn-outline-info">Register</a>
                            <a href="/login" class="btn btn-outline-info">Login</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>
@endguest
</html>
