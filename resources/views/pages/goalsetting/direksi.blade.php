@extends('layouts.default')

@section('content')
<!-- coding starts here  -->
    <div class="slim-mainpanel">
          <div class="container">
            <div class="slim-pageheader">
              <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Goal Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Program Direksi</li>
              </ol>
              <h6 class="slim-pagetitle">Program Kerja Direksi</h6>
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
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            DIREKSI UTAMA                                                    -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @if((Auth::user()->kelas_jabatan <= 5 && $divisi == "Utama") || (Auth::user()->jabatan == "Superadmin"))
              <label class="section-title">Silahkan masukkan Program Kerja Direksi {{Auth::user()->divisi}}</label>
              <button type="button"class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#tambahdireksi">Tambahkan </button>
              <p class="mg-b-20 mg-sm-b-40">Menggunakan form berikut</p>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px;text-align:center;">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="width:150px;text-align:center;">Status</th>
                  <td>Ubah</td>
                  <td>Hapus</td>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($program_direksi_utama as $program)
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
                      <form id="edit" action="{{route('direksi.edit',$program->id)}}" method="get">
                      @csrf
                      <button type="submit" class="btn btn-outline-success">Ubah</button>
                      </form>
                    </td>
                    <td>
                      <form id="hapus" action="{{route('direksi.destroy',$program->id)}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-outline-danger" type="delete">Hapus</a>
                      </form>
                    </td>
                </tr>
                @endforeach
              </table>
              <!-- ///////////////////////////////////////////////REKURSIF/////////////////////////////////////////// -->
              @foreach($seluruh_direksi as $user)
              <label class="section-title">Program Direktur {{$user->divisi}}</label>
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
                  $proker = App\Direksi::where('divisi',$user->divisi)->get();
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
              </table>
              <br>
              <hr>
              @endforeach
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            DIREKSI LAIN                                                     -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @elseif(Auth::user()->kelas_jabatan <= 5 && $divisi != "Utama" && $kelas_jabatan != "TNO")
              <button type="button"class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#tambahdireksi">Tambahkan </button>
              <label class="section-title">Program Direktur {{$divisi}}</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px;text-align:center;">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="width:150px;text-align:center;">Status</th>
                  <td>Ubah</td>
                  <td>Hapus</td>
                </tr>
                </thead>
                <tbody>

                  <?php $i=0;?>
                  @foreach($direksi as $program)
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
                      <form id="edit" action="{{route('direksi.edit',$program->id)}}" method="get">
                      @csrf
                      <button type="submit" class="btn btn-outline-success">Ubah</button>
                      </form>
                    </td>
                    <td>
                      <form id="hapus" action="{{route('direksi.destroy',$program->id)}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-outline-danger" type="delete">Hapus</a>
                      </form>
                    </td>
                </tr>
                @endforeach
              </table>
              <br>
              <hr>
              <label class="section-title">Program Kerja Direksi Utama</label>
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
                  @foreach($program_direksi_utama as $program)
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
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            LAINNYA                                                          -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @else
              <label class="section-title">Program Kerja Direksi Utama</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px;text-align:center;">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="text-align:center;">Target</th>
                  <th style="width:150px;text-align:center;">Status</th>
                </tr>
                </thead>
                <tbody>

                  <?php $i=0;?>
                  @foreach($program_direksi_utama as $program)
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
                    <td style="text-align:center;">{{$program->target_bulanan}}%</td>
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
              <br>
              <hr>
              <label class="section-title">Program Kerja Direksi Terkait</label>
              <p class="mg-b-20 mg-sm-b-40">Berikut adalah Program Kerja Direktur {{Auth::user()->divisi}}</p>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px;text-align:center;">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px;text-align:center;">Tahun</th>
                  <th style="width:150px;text-align:center;">Progres</th>
                  <th style="text-align:center;">Target</th>
                  <th style="width:150px;text-align:center;">Status</th>
                </tr>
                </thead>
                <tbody>

                  <?php $i=0;?>
                  @foreach($direksi as $program)
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
                    <td style="text-align:center;">{{$program->target_bulanan}}%</td>
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
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            MODALS                                                           -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="modal fade" id="tambahdireksi" tabindex="-1" role="dialog" aria-labelledby="ConfigUpdateLabel" aria-hidden="true">
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
                              <form id="tambahdireksi" action="{{route('direksi.store')}}" method="post">
                              {{ csrf_field() }}
                              <label class="section-title">Tambahkan Program Kerja Direktur {{$divisi}}</label>
                              <p class="mg-b-20 mg-sm-b-40">Untuk tahun {{date('Y')}}</p>
                              <div class="form-layout">
                                <div class="row mg-b-25">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      @if(Auth::user()->jabatan == "Superadmin")
                                      <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                                      <select id="select-name" name="nama" class="form-control select" onchange="ChangeNIPP()">
                                        <option>Pilih satu</option>
                                        <option value="277056896">CHIEFY ADI KUSMARGONO</option>
                                        @foreach($seluruh_direksi as $direksi)
                                        <option value="{{$direksi->nipp}}">{{$direksi->nama}}</option>
                                        @endforeach
                                      </select>
                                      @else
                                      <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" name="nama" readonly value="{{$nama}}" >
                                      @endif
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      @if(Auth::user()->jabatan == "Superadmin")
                                      <label class="form-control-label">Divisi: <span class="tx-danger">*</span></label>
                                      <select name="divisi" class="form-control select">
                                        @foreach($seluruh_divisi as $divisi)
                                        <option>{{$divisi->divisi}}</option>
                                        @endforeach
                                      </select>
                                      @else
                                      <label class="form-control-label">Divisi: <span class="tx-danger">*</span></label>
                                      <input id="divisi" class="form-control" type="text" readonly name="divisi" value="{{$divisi}}">
                                      @endif
                                    </div>
                                  </div><!-- col-3 -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      <label class="form-control-label">NIPP: <span class="tx-danger">*</span></label>
                                      <input id="nipp" class="form-control" type="text" readonly name="nipp" value="{{$nipp}}">
                                    </div>
                                  </div><!-- col-3 -->
                                  @if(Auth::user()->divisi == "Utama" || Auth::user()->kelas_jabatan == 1)
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="form-control-label">Direksi Terkait <span class="tx-danger">*</span></label>
                                      <select required name="direksi" class="form-control">
                                        @foreach($seluruh_direksi as $direksi)
                                        <option value="{{$direksi->nipp}}">{{$direksi->nama}} - {{$direksi->jabatan}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div><!-- col-3 -->
                                  @endif
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                                      <textarea required name="proker" class="form-control" type="text"></textarea>
                                    </div>
                                  </div><!-- col-3 -->
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="from" class="form-control-label">Tanggal Mulai <span class="tx-danger">*</span></label><br>
                                        <input required name="from" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd" value="{{$now->format('Y-m-d')}}">
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="to" class="form-control-label">Tanggal Berakhir <span class="tx-danger">*</span></label><br>
                                        <input required name="to" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd" value="{{Carbon\Carbon::tomorrow()->format('Y-m-d')}}">
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
        <script>
        function ChangeNIPP()
        {
          var x = document.getElementById("select-name").value;
          document.getElementById("nipp").value = x;
        }
        </script>
<!-- coding endss here  -->
@stop
