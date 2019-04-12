@extends('layouts.default')

@section('content')
<!-- coding starts here  -->
    <div class="slim-mainpanel">
          <div class="container">
            <div class="slim-pageheader">
              <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Goal Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Program Manajer</li>
              </ol>
              <h6 class="slim-pagetitle">Program Vice President</h6>
            </div><!-- slim-pageheader -->
            <div class="section-wrapper">
              @if (session('success'))
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong> {{ session('success')}} </strong>
              </div><!-- alert -->
              @elseif (session('failed'))
              <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong> {{ session('failed')}} </strong>
              </div><!-- alert -->
              @endif
              <?php use Carbon\Carbon; ?>
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                              Kelas VP                                                       -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @if($kelas_jabatan <=8 && $kelas_jabatan > 5 && $kelas_jabatan != "TNO")
              <button type="button"class="btn float-right" data-toggle="modal" data-target="#tambahmanajer">Tambahkan </button>
              <label class="section-title">Program Anda Sebagai Vice President of {{Auth::user()->sub_divisi}}</label>
              <label class="section-title tx-orange">Mingguan</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px">Minggu</th>
                  <th style="width:150px">Progres</th>
                  <th style="width:150px">Status</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($proker_mingguan as $program)
                  <?php $i++;?>
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td>{{$program->minggu}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_proker}}</span></td>
                    @endif
                    @if($program->status_proker == "Selesai")
                    <td>
                      <form id="edit" action="{{route('vice-president.edit',$program->id)}}" method="get">
                      @csrf
                      <button disabled class="btn btn-outline-success" type="submit">Ubah</button>
                      </form>
                    </td>
                    <td>
                      <form id="hapus" action="{{route('vice-president.destroy',$program->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button disabled class="btn btn-outline-danger" type="submit">Hapus</button>
                    </td>
                    </form>
                    @else
                    <td>
                      <form id="edit" action="{{route('vice-president.edit',$program->id)}}" method="get">
                      @csrf
                      <button class="btn btn-outline-success" type="submit">Ubah</button>
                      </form>
                    </td>
                    <td>
                      <form id="hapus" action="{{route('vice-president.destroy',$program->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-danger" type="submit">Hapus</button>
                    </td>
                    </form>
                    @endif
                </tr>
                @endforeach
              </table>
              {{ $proker_mingguan->links() }}
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <label class="section-title tx-orange">Bulanan</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Bulan</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="width:150px;text-align:center;">Status</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($proker_bulanan as $program)
                  <?php $i++;?>
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td style="text-align:center;">{{$program->bulan}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_proker}}</span></td>
                    @endif
                    <td>
                      <form id="edit" action="{{route('vice-president.edit',$program->id)}}" method="get">
                      @csrf
                      <button class="btn btn-outline-success" type="submit">Ubah</button>
                      </form>
                    </td>
                    <td>
                      <form id="hapus" action="{{route('vice-president.destroy',$program->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-danger" type="submit">Hapus</button>
                    </td>
                    </form>
                </tr>
                @endforeach
              </table>
              {{ $proker_bulanan->links() }}
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <label class="section-title tx-orange">1/2 Tahunan</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="width:150px;text-align:center;">Status</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($proker_settahunan as $program)
                  <?php $i++;?>
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td style="text-align:center;">{{$program->tahun}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_proker}}</span></td>
                    @endif
                    <td>
                      <form id="edit" action="{{route('vice-president.edit',$program->id)}}" method="get">
                      @csrf
                      <button class="btn btn-outline-success" type="submit">Ubah</button>
                      </form>
                    </td>
                    <td>
                      <form id="hapus" action="{{route('vice-president.destroy',$program->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-danger" type="submit">Hapus</button>
                    </td>
                    </form>
                </tr>
                @endforeach
              </table>
              {{ $proker_settahunan->links() }}
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <label class="section-title tx-orange">Tahunan</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px;text-align:center;">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="width:150px;text-align:center;">Status</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($proker_tahunan as $program)
                  <?php $i++;?>
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td style="text-align:center;">{{$program->tahun}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_proker}}</span></td>
                    @endif
                    <td>
                      <form id="edit" action="{{route('vice-president.edit',$program->id)}}" method="get">
                      @csrf
                      <button class="btn btn-outline-success" type="submit">Ubah</button>
                      </form>
                    </td>
                    <td>
                      <form id="hapus" action="{{route('vice-president.destroy',$program->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-danger" type="submit">Hapus</button>
                    </td>
                    </form>
                </tr>
                @endforeach
              </table>
              {{ $proker_tahunan->links() }}
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            Kelas Superadmin                                                 -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @elseif($kelas_jabatan <=1 && $kelas_jabatan != "TNO")
              @foreach($all_vp as $user)
                <label class="section-title">Program Vice President of {{$user->sub_divisi}}</label>
                <table class="table table-orange">
                  <thead>
                  <tr>
                    <td style="width:30px">No</td>
                    <td style="width:500px">Program Kerja</td>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0;
                    $proker = App\Manajer::where('nipp',$user->nipp)->get();
                    ?>
                    @foreach($proker as $program)
                    <?php $i++;?>
                    <tr>
                      <th  scope="row">{{$i}}</th>
                      <td >{{$program->program_kerja}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              @endforeach
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            Kelas Direksi                                                    -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @elseif($kelas_jabatan <=5 && $kelas_jabatan != "TNO")
                @foreach($vp as $user)
                  <label class="section-title">Program Vice President of {{$user->sub_divisi}}</label>
                  <table class="table table-orange">
                    <thead>
                    <tr>
                      <th style="width:30px;text-align:center;">No</th>
                      <th style="width:500px">Program Kerja</th>
                      <th style="width:50px;text-align:center;">Tahun</th>
                      <th style="width:150px;text-align:center;">Progres</th>
                      <th style="width:150px;text-align:center;">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=0;
                      $proker = App\Manajer::where('nipp',$user->nipp)->get();
                      ?>
                      @foreach($proker as $program)
                      <?php $i++;?>
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td style="width:500px">{{$program->program_kerja}}</td>
                        <td style="text-align:center;">{{$program->tahun}}</td>
                        <td >
                          <div class="progress mg-b-5">
                            <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                          </div>
                        </td>
                        @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Belum Disampaikan")
                        <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                        @elseif($program->status_proker == "Sedang Diproses")
                        <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                        @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                        <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                        @elseif($program->status_proker == "Dibatalkan")
                        <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                        @else
                        <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_proker}}</span></td>
                        @endif
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endforeach
                <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <!--                                            Kelas lainnya                                                    -->
                <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @elseif($kelas_jabatan >= 9 || $kelas_jabatan == "TNO")
              <label class="section-title">Program Vice President of {{Auth::user()->sub_divisi}}</label>
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <label class="section-title tx-orange">Mingguan</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px;text-align:center;">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="width:150px;text-align:center;">Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($proker_mingguan as $program)
                  <?php $i++;?>
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td style="text-align:center;">{{$program->tahun}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_proker}}</span></td>
                    @endif
                </tr>
                @endforeach
              </table>
              {{ $proker_mingguan->links() }}
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <label class="section-title tx-orange">Bulanan</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px;text-align:center;">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="width:150px;text-align:center;">Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($proker_bulanan as $program)
                  <?php $i++;?>
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td style="text-align:center;">{{$program->tahun}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_proker}}</span></td>
                    @endif
                </tr>
                @endforeach
              </table>
              {{ $proker_bulanan->links() }}
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <label class="section-title tx-orange">1/2 Tahunan</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px;text-align:center;">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="width:150px;text-align:center;">Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($proker_settahunan as $program)
                  <?php $i++;?>
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td style="text-align:center;">{{$program->tahun}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_proker}}</span></td>
                    @endif
                </tr>
                @endforeach
              </table>
              {{ $proker_settahunan->links() }}
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
              <label class="section-title tx-orange">Tahunan</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px;text-align:center;">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="width:150px;text-align:center;">Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($proker_tahunan as $program)
                  <?php $i++;?>
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td style="text-align:center;">{{$program->tahun}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                    @elseif($program->status_proker == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_proker}}</span></td>
                    @endif
                </tr>
                @endforeach
              </table>
              @endif
              {{ $proker_tahunan->links() }}
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                               MODALS                                                        -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="modal fade" id="tambahmanajer" tabindex="-1" role="dialog" aria-labelledby="ConfigUpdateLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-layout">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-12">
                              <form id="tambahmanajer" action="{{route('vice-president.store')}}" method="post">
                              {{ csrf_field() }}
                              <label class="section-title">Tambahkan Program Kerja Direktur {{$divisi}}</label>
                              <p class="mg-b-20 mg-sm-b-40">Untuk tahun {{date('Y')}}</p>
                              <div class="form-layout">
                                <div class="row mg-b-25">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" name="nama" readonly value="{{$nama}}" >
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      <label class="form-control-label">Sub-Divisi: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" readonly name="divisi" value="{{$divisi}}">
                                    </div>
                                  </div><!-- col-3 -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      <label class="form-control-label">NIPP: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" readonly name="nipp" value="{{$nipp}}">
                                    </div>
                                  </div><!-- col-3 -->
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">Program Direksi Terkait <span class="tx-danger">*</span></label>
                                      <select name="program_direksi" class="form-control select2-show-search" data-placeholder="Choose one">
                                        @foreach($direksi as $program)
                                        <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">Program Kerja Terkait <span class="tx-danger">*</span></label>
                                      <select name="program_kerja_terkait" class="form-control select2-show-search" data-placeholder="Choose one">
                                        <option value="">Tidak ada</option>
                                        <optgroup label="Program Bulanan">
                                          @foreach($proker_bulanan as $program)
                                          <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                          @endforeach
                                        </optgroup>
                                        <optgroup label="Program 1/2 Tahunan">
                                          @foreach($proker_settahunan as $program)
                                          <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                          @endforeach
                                        </optgroup>
                                        <optgroup label="Program Tahunan">
                                          @foreach($proker_tahunan as $program)
                                          <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                          @endforeach
                                        </optgroup>
                                      </select>
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-10">
                                    <div class="form-group">
                                      <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                                      <textarea required name="proker" class="form-control" type="text"></textarea>
                                    </div>
                                  </div><!-- col-9 -->
                                  <div class="col-lg-2">
                                    <div class="form-group">
                                      <label class="form-control-label">Bobot <span class="tx-danger">*</span></label>
                                      <input required name="bobot" class="form-control" type="number" max="100" min="1" value="100">
                                    </div>
                                  </div><!-- col-9 -->
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="from" class="form-control-label">Tanggal Mulai <span class="tx-danger">*</span></label><br>
                                        <input required name="from" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd" value="{{$now->format('Y-m-d')}}">
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="to" class="form-control-label">Tanggal Berakhir <span class="tx-danger">*</span></label><br>
                                        <input required name="to" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd" value="{{Carbon::tomorrow()->format('Y-m-d')}}">
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-6" style="display:none;">
                                    <div class="form-group">
                                        <label for="to" class="form-control-label">Tanggal Berakhir <span class="tx-danger">*</span></label><br>
                                        <textarea required name="minggu" class="form-control" value="{{$now->weekOfYear}}">{{$now->weekOfYear}}</textarea>
                                    </div>
                                  </div><!-- col-6 -->
                                </div><!-- row -->
                              </div><!-- form-layout -->

                            </div> <!-- col-12 -->
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="modal-footer" style="text-align:right;">
                      <button type="submit" class="btn btn-primary bd-0">Tambahkan</button>
                      <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancel</button>
                      <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                    </div>
                  </form>
                </div>
              </div><!-- modal-dialog -->
            </div><!-- modal -->
            </div><!-- section-wrapper -->
          </div>
        </div>


<!-- coding endss here  -->
@stop
