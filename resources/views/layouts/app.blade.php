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
                        <a class="nav-link{{Request::is('/start') ? 'active' : '' }}" href="/start">Start</a>
                    </li>
                    @auth
                        <li>
                            <a class="nav-link{{Request::is('/home') ? 'active' : '' }}" href="/home">Home</a>
                        </li>
                    @endauth
                    <li>
                        <a class="nav-link{{Request::is('/info') ? 'active' : '' }}" href="/info">Info</a>
                    </li>
                    <li>
                        <a class="nav-link{{Request::is('/hobby') ? 'active' : '' }}" href="/hobby">Hobbies</a>
                    </li>
                    <li>
                        <a class="nav-link{{Request::is('/tags') ? 'active' : '' }}" href="/tag">Tags</a>
                    </li>
                </ul>

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

        @isset($message_success)
        <div class="container mb-3 p-6">
            <div class="alert-success" role="alert">
                {!! $message_success !!}
            </div>
        </div>
        @endisset
        
        @isset($message_warning)
        <div class="container mb-3 p-6">
            <div class="alert-warning" role="alert">
                {!! $message_warning !!}
            </div>
        </div>
        @endisset

        @if($errors->any())
            <div class="container">
                <div class="alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach($errors as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
            @yield('content')
        </main>
    </div>
</body>
</html>