<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Yehiz World Entertainment - Best Reliable Contest Platform</title>
    <link rel="icon" type="image/x-icon" href="{{ url('assets/images/logo.png')}}">
    <link href="//fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style-starter.css')}}">
</head>

<body>
    <!-- header -->
    <header id="site-header" class="w3l-header-4 fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke">
                <!--  <h1> <a class="navbar-brand" href="index.html">
                        Photo<span class="sub-spl">f</span>lash
                    </a></h1>-->
               
        <a class="navbar-brand" href="/">
            <img src="{{ url('assets/images/logo.png')}}" alt="Your logo" title="Your logo" style="height:35px;" />
        </a>
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-lg-auto">
                        <li class="nav-item @if(Route::is('Home Page') ) active  @endif">
                            <a class="nav-link" href="{{ route('Home Page') }}">Home 
                            @if(Route::is('Home Page') )
                            <span class="sr-only">(current)</span>
                            @endif
                                </a>
                        </li>
                        <li class="nav-item @if(Route::is('Our Contest') ) active  @endif">
                            <a class="nav-link" href="{{ route('Our Contest') }}">Contest</a>
                            @if(Route::is('Our Contest'))
                            <span class="sr-only">(current)</span>
                                @endif
                                </a>
                        </li>
                        <li class="nav-item @if(Route::is('about') ) active  @endif">
                            <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            @if(Route::is('about') )
                            <span class="sr-only">(current)</span>
                                @endif
                                </a>
                        </li>

                        <li class="nav-item @if(Route::is('contact') ) active  @endif">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            @if(Route::is('contact') )
                            <span class="sr-only">(current)</span>
                                @endif
                                </a>
                        </li>
                    </ul>
                    @if(Auth::check())

                    <ul class="navbar-nav search-right mt-lg-0 mt-2">
                    @if(Auth::user()->user_type == 'admin')
                    <li class="nav-item mr-3" title="Search"><a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            @if(Route::is('Logout') )
                            <span class="sr-only">(current)</span>
                                @endif
                                </a></li>
                                @endif
                        <li class="nav-item"><a href="{{ route('dashboard') }}"
                                class="btn btn-primary d-none d-lg-block btn-style">Dashboard</a>
                        </li>
                    </ul>

                    @else
                    
                    <ul class="navbar-nav search-right mt-lg-0 mt-2">
                        <li class="nav-item mr-3" title="Search"><a class="nav-link" href="{{ route('login') }}">Login</a>
                            @if(Route::is('Login') )
                            <span class="sr-only">(current)</span>
                                @endif
                                </a></li>
                        <li class="nav-item"><a href="{{ route('register') }}"
                                class="btn btn-primary d-none d-lg-block btn-style">Sign Up</a>
                        </li>
                    </ul>

                    @endif


                    <!-- //toggle switch for light and dark theme -->
                    <!-- search popup -->
                    <!-- /search popup -->
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!-- //header -->