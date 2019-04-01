<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('parts.head')
</head>

<body>
  @include('parts.header')
  <div class="slim-navbar">
    <div class="container">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="home">
            <i class="icon ion-home"></i>
            <span>Home</span>
          </a>
        </li>
      </ul>
    </div><!-- container -->
  </div><!-- slim-navbar -->

  @yield('content')
  @include('parts.footer')
  @include('parts.footer-scripts')

</body>
</html>
