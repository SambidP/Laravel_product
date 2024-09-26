<!doctype html>
<html lang="{{ str_replace('_', '-',  app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel 11 CRUD  Application</title>
    


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body class="page">
<section id="nav-bar">
  <nav class="navbar navbar-expand-lg navbar-light p-4">
    <a class="navbar-brand" href="/">
        <img src="/assets/img/laravel_icon_1.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Product App
      </a>
      <ul class="navbar-nav ms-auto">
        <li>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-info margin-left ">
              Logout
            </button>
          </form>
        </li>
  </nav>
</section>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>


        