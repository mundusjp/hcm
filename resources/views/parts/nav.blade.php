<div class="slim-navbar">
  <div class="container">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="home">
          <i class="icon ion-home"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item with-sub">
        <a class="nav-link" href="">
          <i class="icon ion-archive"></i>
          <span>Goalsetting</span>
        </a>
        <div class="sub-item">
          <ul>
            @if(Auth::user()->kelas_jabatan <= 1)
            <li><a href="perusahaan">Perusahaan</a></li>
            <li><a href="direksi">Direksi</a></li>
            <li><a href="vice-president">Vice President</a></li>
            <li><a href="deputy-vice-president">DVP</a></li>
            <li><a href="users">User Control</a></li>
            @elseif(Auth::user()->kelas_jabatan <= 5 && Auth::user()->divisi == "Utama")
            <li><a href="perusahaan">Perusahaan</a></li>
            <li><a href="direksi">Direksi</a></li>
            @elseif(Auth::user()->kelas_jabatan <= 5)
            <li><a href="perusahaan">Perusahaan</a></li>
            <li><a href="direksi">Direksi</a></li>
            <li><a href="vice-president">Vice President</a></li>
            @else
            <li><a href="perusahaan">Perusahaan</a></li>
            <li><a href="direksi">Direksi</a></li>
            <li><a href="vice-president">Vice President</a></li>
            <li><a href="deputy-vice-president">DVP</a></li>
            @endif

          </ul>
        </div><!-- dropdown-menu -->
      </li>
      <li class="nav-item with-sub">
        <a class="nav-link" href="goalmatching">
          <i class="icon ion-ios-gear"></i>
          <span>Goalmatching</span>
        </a>
        <div class="sub-item">
          <ul>
            @if(Auth::user()->kelas_jabatan >5 && Auth::user()->kelas_jabatan <= 8 )
            <li><a href="goalmatching-coach">Coach</a></li>
            <li><a href="goalmatching-evaluasi">Evaluasi</a></li>
            @elseif(Auth::user()->kelas_jabatan > 8 && Auth::user()->kelas_jabatan <=10)
            <li><a href="goalmatching-coachee">Coachee</a></li>
            <li><a href="goalmatching-evaluasi">Evaluasi</a></li>
            @endif
          </ul>
        </div><!-- dropdown-menu -->
      </li>
    </ul>
  </div><!-- container -->
</div><!-- slim-navbar -->
