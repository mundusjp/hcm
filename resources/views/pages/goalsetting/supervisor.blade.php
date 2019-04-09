@extends('layouts.default')

@section('content')
<!-- coding starts here  -->
    <div class="slim-mainpanel">
          <div class="container">
            <div class="slim-pageheader">
              <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Goal Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Program DVP</li>
              </ol>
              <h6 class="slim-pagetitle">Program Deputy Vice Director of {{Auth::user()->sub_subdivisi}}</h6>
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
              <!--                                            VicePresident                                                    -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @if($kelas_jabatan <= 8 && $kelas_jabatan >= 6)
              @foreach($semua_dpv as $user)
              <label class="section-title">Program Deputy Vice President of {{$user->sub_subdivisi}}</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px">Deadline</th>
                  <th style="width:150px">Progres</th>
                  <th style="width:150px">Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;
                  $proker_dvp = App\Task::where('nipp',$user->nipp)->get();
                  ?>
                  @foreach($proker_dvp as $program)
                  <?php $i++;?>
                  <tr>
                  <th scope="row">{{$i}}</th>
                  <td style="width:500px">{{$program->program_kerja}}</td>
                  <td>{{$program->due_date}}</td>
                  <td >
                    <div class="progress mg-b-5">
                      <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                    </div>
                  </td>
                  @if($program->status_task == "Belum Direspon" || $program->status_task == "Belum Disampaikan")
                  <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_task}}</span></td>
                  @elseif($program->status_task == "Sedang Diproses")
                  <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_task}}</span></td>
                  @elseif($program->status_task == "Terlambat" || $program->status_task == "Diperingatkan" || $program->status_task == "Ditunda" || $program->status_task == "Konfirmasi Dibatalkan")
                  <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_task}}</span></td>
                  @elseif($program->status_task == "Dibatalkan")
                  <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_task}}</span></td>
                  @else
                  <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_task}}</span></td>
                  @endif
                </tr>
                @endforeach
              </table>
              <br>
              @endforeach
              <hr>
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            Kelas DVP                                                        -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @elseif(($kelas_jabatan >= 9 && $kelas_jabatan <=10) ||($jabatan == "Superadmin"))
              @if(empty($program_vp[0]))
              <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong> Tidak ada tugas dari Vice President yang sedang diproses. Silahkan kembali ke dashboard dan tekan tombol Proses </strong>
              </div><!-- alert -->
              <button disabled type="button"class="btn float-right" data-toggle="modal" data-target="#tambahdvp">Tambahkan </button>
              @else
              <button type="button"class="btn float-right" data-toggle="modal" data-target="#tambahdvp">Tambahkan </button>
              @endif
              <label class="section-title">Program Kerja Anda Sebagai {{$jabatan}} {{$divisi}}</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <th style="width:30px">No</th>
                  <th style="width:500px">Program Kerja</th>
                  <th style="width:50px">Deadline</th>
                  <th style="width:150px">Progres</th>
                  <th style="width:150px">Status</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($tugas as $program)
                  <?php $i++;?>
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td>{{$program->due_date}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_task == "Belum Direspon" || $program->status_task == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_task}}</span></td>
                    @elseif($program->status_task == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_task}}</span></td>
                    @elseif($program->status_task == "Terlambat" || $program->status_task == "Diperingatkan" || $program->status_task == "Ditunda" || $program->status_task == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_task}}</span></td>
                    @elseif($program->status_task == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_task}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_task}}</span></td>
                    @endif
                  <td>
                    <form id="edit" action="{{route('deputy-vice-president.edit',$program->id)}}" method="get">
                    @csrf
                    <button class="btn btn-outline-success" type="submit">Ubah</button>
                    </form>
                  </td>
                  <td>
                    <form id="hapus" action="{{route('deputy-vice-president.destroy',$program->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit">Hapus</button>
                  </td>
                  </form>
                </tr>
                @endforeach
              </table>
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                      Kelas Officer & TNO                                                    -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @else
                <label class="section-title">Program Kerja Deputy Vice Director {{Auth::user()->sub_subdivisi}}</label>
                <table class="table table-orange">
                  <thead>
                  <tr>
                    <th style="width:30px">No</th>
                    <th style="width:500px">Program Kerja</th>
                    <th style="width:50px">Deadline</th>
                    <th style="width:150px">Progres</th>
                    <th style="width:150px">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0;
                    $proker_dvp = App\Task::where('nipp_pj',Auth::user()->nipp)->get();
                    ?>
                    @foreach($proker_dvp as $program)
                    <?php $i++;?>
                    <tr>
                    <th scope="row">{{$i}}</th>
                    <td style="width:500px">{{$program->program_kerja}}</td>
                    <td>{{$program->due_date}}</td>
                    <td >
                      <div class="progress mg-b-5">
                        <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                      </div>
                    </td>
                    @if($program->status_task == "Belum Direspon" || $program->status_task == "Belum Disampaikan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_task}}</span></td>
                    @elseif($program->status_task == "Sedang Diproses")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_task}}</span></td>
                    @elseif($program->status_task == "Terlambat" || $program->status_task == "Diperingatkan" || $program->status_task == "Ditunda" || $program->status_task == "Konfirmasi Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_task}}</span></td>
                    @elseif($program->status_task == "Dibatalkan")
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_task}}</span></td>
                    @else
                    <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_task}}</span></td>
                    @endif
                  </tr>
                  @endforeach
                </table>
              @endif
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                             MODALS                                                          -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="modal fade" id="tambahdvp" tabindex="-1" role="dialog" aria-labelledby="ConfigUpdateLabel" aria-hidden="true">
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
                              <form action="{{route('deputy-vice-president.store')}}" method="post">
                              {{ csrf_field() }}
                              <label class="section-title">Tambahkan Program Kerja Direktur {{$divisi}}</label>
                              <p class="mg-b-20 mg-sm-b-40">Untuk tahun {{date('Y')}}</p>
                              <div class="form-layout">
                                <div class="row mg-b-25">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" name="nama" readonly value="{{Auth::user()->nama}}" >
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      <label class="form-control-label">Sub-Subdivisi: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" readonly name="divisi" value="{{Auth::user()->sub_subdivisi}}">
                                    </div>
                                  </div><!-- col-3 -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      <label class="form-control-label">NIPP: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" readonly name="nipp" value="{{Auth::user()->nipp}}">
                                    </div>
                                  </div><!-- col-3 -->
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="form-control-label">Program VP Terkait <span class="tx-danger">*</span></label>
                                      <select name="program_vp" class="form-control select2-show-search" data-placeholder="Choose one">
                                        @foreach($program_vp as $program)
                                        <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div><!-- col-12 -->
                                  <div class="col-lg-10">
                                    <div class="form-group">
                                      <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                                      <textarea required name="proker" class="form-control" type="text"></textarea>
                                    </div>
                                  </div><!-- col-9 -->
                                  <div class="col-lg-2">
                                    <div class="form-group">
                                      <label class="form-control-label">Bobot <span class="tx-danger">*</span></label>
                                      <input required name="bobot" class="form-control" type="number" min="1" max="100" value="100">
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


<!-- coding endss here  -->
@stop
