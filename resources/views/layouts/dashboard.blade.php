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
<script>
$(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });
      });
</script>
</body>
</html>
