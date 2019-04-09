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
          <form id="back" action="{{route('back')}}" method="get">
            @csrf
          <a href="javascript:;" onclick="document.getElementById('back').submit();" class="nav-link">
            <i class="icon ion-home"></i>
            <span>Home</span>
          </a>
          </form>
        </li>
      </ul>
    </div><!-- container -->
  </div><!-- slim-navbar -->

  @yield('content')
  @include('parts.footer')
  @include('parts.footer-scripts')

</body>
</html>
