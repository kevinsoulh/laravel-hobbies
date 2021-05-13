<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- csrf token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- styles -->
    <link href="{{ asset('styles/bootstrap.css') }}" rel="stylesheet"/>
    <script src="{{ asset('scripts/bootstrap.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a class="nav-link{{Request::is('/') ? 'active' : ''}}" href="/home">Laravel</a>
                    </li>
                    <li>
                        <a class="nav-link{{Request::is('/info') ? 'active' : ''}}" href="/start">Start</a>
                    </li>
                    <li>
                        <a class="nav-link{{Request::is('info') ? 'active' : ''}}" href="/info">Info</a>
                    </li>
                </ul>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ 'Toggle navigation' }}">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse-navbar-collapse" id="navbarSupportedContent">

               <!-- left side of navbar -->
               <div class="container-fluid">
                    
               </div>

               <!-- right side of navbar --> 
               <ul class="navbar-nav ml-auto">
                    <!-- authentication links -->
                    @guest
                        <li>
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if(Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ ('register') }}">Register</a>
                        </li>
                        @endif
                        @else
                        <li calss="nav-item">
                            <div class="dropdown">
                                <button type="button" id="navbarDropdown" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    @endguest
               </ul>
               </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>