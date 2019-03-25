<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta -->
    <meta name="description" content="Goalsetting PT Indonesia Kendaraan Terminal.">
    <meta name="author" content="Human Capital Team">

    <title>Goalsetting PT Indonesia Kendaraan Terminal</title>

    <!-- vendor css -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('lib/jquery-toggles/css/toggles-full.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('lib/jquery-typeahead/dist/jquery.typeahead.min.css') }}" rel="stylesheet" type="text/css" >
    <!-- Slim CSS -->
    <link href="{{ asset('css/slim.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div id="app">
      <div class="slim-header">
        <div class="container">
          <div class="slim-header-left">
            <h2 class="slim-logo"><a href="/" style="color:#ff6600;">PT. IKT<span></span></a></h2>
          </div><!-- slim-header-left -->
          <div class="slim-header-right">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
          </div><!-- header-right -->
        </div><!-- container -->
      </div><!-- slim-header -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
