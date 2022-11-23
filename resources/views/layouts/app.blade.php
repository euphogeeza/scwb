<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>{{ config('app.name', "SCWB Website") }}</title>
  </head>
  <body>
    <!-- HEADING -->
    <div class="container">
        {{-- <img src="{{ asset('/images/header1024x497.png') }}" alt="@yield('subtitle', 'Snowdown Colliery Welfare Band')"> --}}
        <img src="{{ asset('/images/header1920x344.png') }}" alt="@yield('subtitle', 'Snowdown Colliery Welfare Band')">
    </div>
    <!-- HEADING -->

    <!-- NAVIGATION -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" href="#">Home </a> </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">About </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"> - The Band </a></li>
                        <li><a class="dropdown-item" href="#"> - The Players </a></li>
                        <li><a class="dropdown-item" href="#"> - Find Us </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Performances </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('concert.index') }}"> - Concerts </a></li>
                        <li><a class="dropdown-item" href="#"> - Google Calendar </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Music Library </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('music.index') }}"> - A-Z by Title </a></li>
                        <li><a class="dropdown-item" href="{{ route('composer.index') }}"> - A-Z by Composer </a></li>
                        <li><a class="dropdown-item" href="{{ route('style.index') }}"> - A-Z by Style </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Photo Album </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#2018"> - 2018 - Present</a></li>
                        <li><a class="dropdown-item" href="#2009"> - 2009 - 2018</a></li>
                        <li><a class="dropdown-item" href="#1994"> - 1994 - 2009</a></li>
                        <li><a class="dropdown-item" href="#1928"> - 1928 - 1994</a></li>
                    </ul>
                </li>
    
                </ul>    
            </div> <!-- navbar-collapse.// -->
        </nav>
    </div>
    <!-- NAVIGATION -->

    <!-- MAIN BODY -->
    <div class="container">
        <div class="row">
            <div class="col-2 scwb_sidebar">
                @yield('sidebar')
            </div>
            <div class="col-10">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- MAIN BODY -->

    <!-- FOOTER -->
    <div class="bg-primary">
        <div class="container">
            <div class="copyright py-4 text-center text-white">
                <small>Copyright - Snowdown Colliery Welfare Band</small>
            </div>
        </div>
    </div>
    
    <!-- FOOTER -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
