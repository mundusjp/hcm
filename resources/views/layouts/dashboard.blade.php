<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('parts.head')
</head>

<body>
  @include('parts.header')
  @include('parts.nav')
  @yield('content')
  @include('parts.footer')
  @include('parts.footer-scripts')
</body>
</html>