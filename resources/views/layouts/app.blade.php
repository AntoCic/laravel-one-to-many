<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CV-Cicala') }}</title>
 
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" @class([
        'app-bg' => !Auth::check()
    ])>
        @guest
            <div class="container">
                <nav class="row align-items-center text-white">
                    <div class="col-3">
                        <img src="{{ Vite::asset('resources/img/foto.png') }}" alt="foto-personale">
                    </div>
                    
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-end">
                            <h1><a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/img/logo.png') }}" width="50"></a> nome Cognome</h1>
                            <div>
                                <button class="btn btn-st1"><img src="{{ Vite::asset('resources/img/dow_ico.png') }}" alt=""></button>
                                
                                <div class="dropdown">
                                    <button class="btn btn-st1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="material-symbols-rounded">
                                            face_5
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                        <li class="dropdown-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <h4>skills</h4>
                    </div>
                    <div class="col-auto">
                    </div>
                </nav>
            </div>
        @else
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel">
                        <img src="{{ Vite::asset('resources/img/logo.png') }}" width="50">
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/') }}"><span class="material-symbols-rounded">
                                home
                                </span></a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/projects')}}">Progetti</a>
                            </li>
                        @endif
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @endguest
       

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
