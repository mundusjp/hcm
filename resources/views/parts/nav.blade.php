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
        @if(Auth::user()->kelas_jabatan <=5)
        <a class="nav-link" href="direksi">
          <i class="icon fa fa-compass"></i>
          <span>Goalsetting</span>
        </a>
        @elseif(Auth::user()->kelas_jabatan >5 && Auth::user()->kelas_jabatan <= 8 )
        <a class="nav-link" href="vice-president">
          <i class="icon fa fa-compass"></i>
          <span>Goalsetting</span>
        </a>
        @elseif(Auth::user()->kelas_jabatan >8 && Auth::user()->kelas_jabatan <= 10 )
        <a class="nav-link" href="deputy-vice-president">
          <i class="icon fa fa-compass"></i>
          <span>Goalsetting</span>
        </a>
        @else
        <a class="nav-link" href="deputy-vice-president">
          <i class="icon fa fa-compass"></i>
          <span>Goalsetting</span>
        </a>
        @endif
        <div class="sub-item">
          <ul>
            @if(Auth::user()->kelas_jabatan <= 5 && Auth::user()->divisi == "Utama")
            <li><a href="perusahaan">Perusahaan</a></li>
            <li><a href="direksi">Direksi</a></li>
            @elseif(Auth::user()->kelas_jabatan <= 5 && Auth::user()->kelas_jabatan != "TNO")
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
      <!-- @if(Auth::user()->kelas_jabatan != 5 && Auth::user()->kelas_jabatan != 4)
      <li class="nav-item with-sub">
        <a class="nav-link" href="goalmatching">
          <i class="icon fa fa-exchange"></i>
          <span>Goalmatching</span>
        </a>
        <div class="sub-item">
          <ul>
            @if(Auth::user()->kelas_jabatan >5 && Auth::user()->kelas_jabatan <= 8 )
            <li><a href="goalmatching-coach">Coach</a></li> -->
            <!-- <li><a href="goalmatching-evaluasi">Evaluasi</a></li> -->
            <!-- @elseif(Auth::user()->kelas_jabatan > 8 && Auth::user()->kelas_jabatan <=10)
            <li><a href="goalmatching-coach">Coach</a></li>
            <li><a href="goalmatching-coachee">Coachee</a></li> -->
            <!-- <li><a href="goalmatching-evaluasi">Evaluasi</a></li> -->
            <!-- @else
            <li><a href="goalmatching-coachee">Coachee</a></li> -->
            <!-- <li><a href="goalmatching-evaluasi">Evaluasi</a></li> -->
            <!-- @endif -->
          <!-- </ul> -->
        <!--</div>--><!-- dropdown-menu -->
      <!-- @endif -->
    <!-- </li> -->
    </ul>
  </div><!-- container -->
</div><!-- slim-navbar -->
