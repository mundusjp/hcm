<div class="slim-header">
  <div class="container">
    <div class="slim-header-left">
      <h2 class="slim-logo"><img src="{{asset('/img/ikt-logo.png')}}" href="http://indonesiacarterminal.co.id"></img></h2>

      <!-- <div class="search-box">
        <input type="text" class="form-control" placeholder="Search">
        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
      </div> -->
    </div><!-- slim-header-left -->
    <div class="slim-header-right">
      <div class="dropdown dropdown-c">
        <a href="#" class="logged-user" data-toggle="dropdown">
          <img src="{{Auth::user()->avatar}}" alt="">
          <span>{{Auth::user()->nama}}</span>
          <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <nav class="nav">
            <a href="#" class="nav-link"><i class="icon ion-ios-gear"></i> Profil</a>
            <form id="logout" action="{{route('logout')}}" method="post">
              @csrf
              <a href="javascript:;" onclick="document.getElementById('logout').submit();" class="nav-link"><i class="icon ion-forward"></i> Sign Out</a>
            </form>
          </nav>
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
    </div><!-- header-right -->
  </div><!-- container -->
</div><!-- slim-header -->
