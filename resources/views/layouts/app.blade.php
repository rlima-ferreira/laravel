<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="nav-wrapper">
                <a class="brand-logo" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="right">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <li><a class="dropdown-trigger" href="#!" data-target="book">Livros<i class="material-icons right">arrow_drop_down</i></a></li>
                                <ul id="book" class="dropdown-content">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('book.index') }}">Listar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('book-update') }}">Atualizar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('book-delete') }}">Deletar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('book-read') }}">Lidos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('book-wanted') }}">Desejados</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <li><a class="dropdown-trigger" href="#!" data-target="profile">Perfis<i class="material-icons right">arrow_drop_down</i></a></li>
                                <ul id="profile" class="dropdown-content">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">Listar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile-update') }}">Atualizar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile-delete') }}">Deletar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <li><a class="dropdown-trigger" href="#!" data-target="contact">Contatos<i class="material-icons right">arrow_drop_down</i></a></li>
                                <ul id="contact" class="dropdown-content">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('contact.index') }}">Listar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('contact-update') }}">Atualizar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('contact-delete') }}">Deletar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <li>
                                    <a class="dropdown-trigger" href="#!" data-target="account">
                                        {{ Auth::user()->name }}
                                        <i class="material-icons right">arrow_drop_down</i>
                                    </a>
                                </li>
                                <ul id="account" class="dropdown-content">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main style="padding: 30px 0;">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function(){
            $(".dropdown-trigger").dropdown();
        })
    </script>
</body>
</html>
