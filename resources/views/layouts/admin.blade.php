<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('adminparts.head')
</head>

<body>

  @include('adminparts.nav')
  <div id="right-panel" class="right-panel">
  @include('adminparts.header')
  @yield('content')
  <div class="clearfix"></div>
  @include('adminparts.footer')
  @include('adminparts.footer-scripts')
</body>
</html>
