<div class="slim-header">
  <div class="container">
    <div class="slim-header-left">
      <h2 class="slim-logo"><a href="/" style="color:#ff6600;">PT. IKT<span></span></a></h2>

      <!-- <div class="search-box">
        <input type="text" class="form-control" placeholder="Search">
        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
      </div> -->
    </div><!-- slim-header-left -->
    <div class="slim-header-right">
      <div class="dropdown dropdown-c">
        <a href="#" class="logged-user" data-toggle="dropdown">
          <img src="http://via.placeholder.com/500x500" alt="">
          <span>Admin</span>
          <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <nav class="nav">
            <a href="#" class="nav-link"><i class="icon ion-ios-gear"></i> Account Settings</a>
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
