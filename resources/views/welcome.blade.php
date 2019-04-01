<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>IKT Goalsetting Management System</title>

    <!-- vendor css -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet" type="text/css" >

    <!-- Slim CSS -->
    <link href="{{ asset('css/slim.css') }}" rel="stylesheet" type="text/css" >

  </head>
  <body class="slim-landing">

    <div class="slim-landing-header">
      <div class="container">
        <div class="slim-landing-header-left">
          <h1>PT. Indonesia Kendaraan Terminal, Tbk.</h1>
          <p>Goalsetting Management System</p>
        </div>
      </div><!-- container -->
    </div><!-- slim-landing-header -->

    <div class="slim-landing-headline">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h1>Silahkan login melalui panel berikut.</h1>
            <h5>Sistem ini masih dalam tahap pengembangan sehingga ada kemungkinan error yang tidak terduga</h5>
          </div><!-- col-6 -->
          <div class="col-lg-6 mg-t-20 mg-lg-t-0">
            <div class="signin-wrapper">
              <div class="signin-box">
                <img src="{{asset('/img/ikt-logo.png')}}">
                <h2 class="signin-title-primary">Welcome back!</h2>
                <h3 class="signin-title-secondary">Sign in to continue.</h3>
                <form id="login" action="{{route('login')}}" method="get">
                  <button type="submit" class="btn btn-primary btn-block btn-signin">Login</button>
                </form>
              </div><!-- signin-box -->
          </div><!-- col-6 -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!--slim-landing-headline -->

    <script type="text/javascript" src="{{ asset('lib/jquery/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/popper.js/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>
  </body>
</html>
