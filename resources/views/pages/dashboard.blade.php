@extends('layouts.dashboard')

@section('content')
<!-- coding starts here  -->
<div class="slim-mainpanel">
     <div class="container">
       <div class="slim-pageheader">
         <ol class="breadcrumb slim-breadcrumb">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
         </ol>
         <h6 class="slim-pagetitle">Dashboard</h6>
       </div><!-- slim-pageheader -->
       <div class="section-wrapper mg-t-20">
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
         <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
         <!--                                UNTUK KELAS DIREKSI                                       -->
         <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
         @if(Auth::user()->kelas_jabatan <= 5)
         <label class="section-title">Status Program Kerja Anda</label>
         @foreach($officer as $vp)
            <label class="section-title tx-warning">{{$vp->sub_divisi}}</label>
           <div class="table-responsive">
             <table class="table table-hover mg-b-0">
               <thead>
                 <tr>
                   <th style="width:5%;">No.</th>
                   <th style="width:50%;">Program Kerja</th>
                   <th style="text-align:center;width:15%;">Status</th>
                   <th style="text-align:center;width:15%;">Progres</th>
                   <th style="text-align:center;width:5%;">Target</th>
                   <th style="text-align:center;width:10%;">Aksi</th>
                 </tr>
               </thead>
               <tbody>
                 <?php $i=0; ?>
                 @foreach($direksi as $programs)
                 @if($programs->nipp_pj == $vp->nipp)
                 <?php $i++; ?>
                 <tr>
                   <td>{{$i}}</td>
                   <td>{{$programs->program_kerja}}</td>
                   @if($programs->status_proker == "Belum Direspon" || $programs->status_proker == "Belum Disampaikan")
                   <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$programs->status_proker}}</span></td>
                   @elseif($programs->status_proker == "Sedang Diproses")
                   <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$programs->status_proker}}</span></td>
                   @elseif($programs->status_proker == "Terlambat" || $programs->status_proker == "Diperingatkan" || $programs->status_proker == "Ditunda" || $programs->status_proker == "Konfirmasi Dibatalkan")
                   <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$programs->status_proker}}</span></td>
                   @elseif($programs->status_proker == "Dibatalkan")
                   <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$programs->status_proker}}</span></td>
                   @else
                   <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$programs->status_proker}}</span></td>
                   @endif
                   <td>
                     <div class="progress mg-b-5">
                       <div class="progress-bar progress-bar-lg bg-warning wd-{{$programs->progres}}p" role="progressbar" aria-valuenow="{{$programs->progres}}" aria-valuemin="0" aria-valuemax="100">{{$programs->progres}}%</div>
                     </div>
                   </td>
                   <td style="text-align:center;">{{$programs->target_bulanan}}%</td>
                   <form action="{{route('direksi.edit-target',$programs->id)}}" method="get">
                     @csrf
                   <td><button class="btn btn-outline-warning">Ubah Target</button></td>
                  </form>
                 </tr>
                 @endif
                 @endforeach
               </tbody>
             </table>
           </div>
           <hr>
         @endforeach
        </div>
             <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
             <!--                               UNTUK KELAS VICE PRESIDENT                                 -->
             <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
             @elseif(Auth::user()->kelas_jabatan > 5 && Auth::user()->kelas_jabatan <=8)
             <label class="section-title">Dashboard Vice President of {{Auth::user()->sub_divisi}}</label>
             <hr>
             <button class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#assigntasktodvp"> Tambahkan</button>
             <label class="section-title">Assign Task to Deputy Vice President</label>
             <p>Berikut adalah tabel dengan pembagian pekerjaan ke DVP anda</p>
             <table class="table table-orange">
               <thead>
               <tr>
                 <td style="width:25px;">ID</td>
                 <td style="width:300px;text-align:center;">Task</td>
                 <td style="width:50px;text-align:center;">Penanggung Jawab</td>
                 <td style="width:25px;text-align:center;">Status</td>
                 <td style="width:200px;text-align:center;">Keterangan</td>
                 <td style="width:25px;text-align:center;">Konfirmasi</td>
                 <td style="width:25px;text-align:center;">Tolak</td>
                 <td style="width:25px;text-align:center;">Batalkan</td>
               </tr>
               </thead>
               <tbody>
                 <?php $i=0;?>
                 @foreach($assigned_proker_vp as $program)
                 <?php $i++;?>
                 <tr>
                   <td>{{$i}}</td>
                   <td>{{$program->program_kerja}}</td>
                   <td><?php $user= App\User::where('nipp',$program->nipp_pj)->first(); echo $user->nama;?></td>
                   @if($program->status_proker == "Belum Direspon")
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
                   <td>{{$program->keterangan}}</td>
                   @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Sedang Diproses" || $program->status_proker == "Diperingatkan")
                   <td><button disabled class="btn btn-outline-success">Konfirmasi</button></td>
                   <td><button disabled class="btn btn-outline-warning">Tolak</button></td>
                   <form method="get" action="{{route('vice-president.batalkan-page',$program->id)}}">
                     @csrf
                   <td><button class="btn btn-outline-danger">Batalkan</button></td>
                  </form>
                   @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan")
                   <td><button disabled class="btn btn-outline-success">Konfirmasi</button></td>
                   <form method="get" action="{{route('vice-president.peringatkan-page',$program->id)}}">
                     @csrf
                   <td><button class="btn btn-outline-warning">Peringatkan</button></td>
                  </form>
                   <form method="get" action="{{route('vice-president.batalkan-page',$program->id)}}">
                     @csrf
                   <td><button class="btn btn-outline-danger">Batalkan</button></td>
                  </form>
                   @elseif($program->status_proker == "Konfirmasi Selesai")
                   <form method="post" action="{{route('vice-president.konfirmasi',$program->id)}}">
                     @method('PATCH')
                     @csrf
                   <td><button class="btn btn-outline-success">Konfirmasi</button></td>
                  </form>
                  <form method="get" action="{{route('vice-president.reject-page',$program->id)}}">
                    @csrf
                   <td><button class="btn btn-outline-warning">Tolak</button></td>
                  </form>
                   <td><button disabled class="btn btn-outline-danger">Batalkan</button></td>
                   @elseif($program->status_proker == "Selesai" || $program->status_proker == "Dibatalkan")
                   <td><button disabled class="btn btn-outline-success">Konfirmasi</button></td>
                   <td><button disabled class="btn btn-outline-warning">Tolak</button></td>
                   <td><button disabled class="btn btn-outline-danger">Batalkan</button></td>
                   @endif
                 </tr>
                 @endforeach
               </tbody>
             </table>
             {{$assigned_proker_vp->links()}}
             <hr>
             <!-- ///////////////////////////////////////STATUS DVP////////////////////////////////////////////////  -->
             <label class="section-title">Status Deputy Vice Director</label>
             <p>Berikut adalah status dan performa dari seluruh DVP anda</p>
             <div class="row">
               @foreach($officer as $user)
               <div class="col">
                 <h6 class="tx-orange"><strong>{{$user->nama}}</strong></h6>
                 @foreach($performa_dvp as $performa)
                 @if($performa->nipp == $user->nipp)
                 <ul class="list-group">
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Jumlah Pekerjaan Minggu ini:</strong><br> <span class="text-muted" style="text-align:right;">{{$performa->jumlah_task_minggu_ini}}</span></p>
                  </li>
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Jumlah Pekerjaan Gagal Minggu ini:</strong><br> <span class="text-muted" style="text-align:right;">{{$performa->jumlah_task_gagal_minggu_ini}}</span></p>
                  </li>
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Performa Minggu ini:</strong><br> <span class="text-muted align-right">{{$performa->performa_minggu_ini}}%</span></p>
                  </li>
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Performa Bulan ini:</strong><br> <span class="text-muted align-right">{{$performa->performa_bulan_ini}}%</span></p>
                  </li>
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Lihat Logbook:</strong><br> <span class="text-muted"><a href="">Harian</a></span> <span class="text-muted">| <a href="">Mingguan</a></span><span class="text-muted">| <a href="">Bulanan</a></span></p>
                  </li>
                </ul>
                @endif
                @endforeach

               </div>
               @endforeach
             </div>
             <!-- ///////////////////////////////////////MODALS////////////////////////////////////////////////  -->
             <!-- ################## MODAL 1 ###################### -->
             <div class="modal fade" id="assigntasktodvp" tabindex="-1" role="dialog" aria-labelledby="assigntask" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h6 class="modal-title" id="ConfigUpdateLabel">Berikan Tugas ke DVP</h6>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <div class="form-layout">
                       <div class="row mg-b-25">
                         <div class="col-12">
                           <div class="form-group">
                             <form method="post" action="{{route('assign-task-to-dvp')}}">
                              @csrf
                             <label class="form-control-label">Program Kerja Anda <span class="tx-danger">*</span></label>
                             <select name="id" class="form-control select2" data-placeholder="Choose one">
                               <optgroup label="Program Tahunan">
                                 @foreach($proker_vp_tahunan as $program)
                                 <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                 @endforeach
                               </optgroup>
                               <optgroup label="Program 1/2 Tahunan">
                                 @foreach($proker_vp_settahunan as $program)
                                 <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                 @endforeach
                               </optgroup>
                               <optgroup label="Program Bulanan">
                                 @foreach($proker_vp_bulanan as $program)
                                 <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                 @endforeach
                               </optgroup>

                             </select>
                           </div>
                         </div>
                         <div class="col-12">
                           <div class="form-group">
                             <label class="form-control-label">Target: <span class="tx-danger">*</span></label>
                             <textarea class="form-control" type="text" name="target"></textarea>
                           </div>
                         </div>
                         <div class="col-12">
                           <div class="form-group">
                             <label class="form-control-label">DVP Anda <span class="tx-danger">*</span></label>
                             <select name="nipp_pj" class="form-control select2" data-placeholder="Choose one">
                               @foreach($officer as $user)
                               <option value="{{$user->nipp}}">{{$user->nama}}</option>
                               @endforeach
                             </select>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="modal-footer" style="text-align:right;">
                     <button type="submit" class="btn btn-primary bd-0">Tambahkan</button>
                     <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancel</button>
                      </form>
                     <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                   </div>
                 </div>
               </div><!-- modal-dialog -->
             </div><!-- modal -->
             <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
             <!--                            UNTUK KELAS DEPUTY VICE PRESIDENT                             -->
             <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
             @elseif(Auth::user()->kelas_jabatan > 8 && Auth::user()->kelas_jabatan <=10)
             <label class="section-title">Dashboard Deputy Vice President of {{Auth::user()->sub_subdivisi}}</label>
             <hr>
             <button class="btn btn-warning float-right" data-toggle="modal" data-target="#tambahlogbook"> Tambah Logbook</button>
             <button class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#assigntasktoofficer"> Assign Task </button>
             <label class="section-title">Task List dari Vice President of {{Auth::user()->sub_divisi}}</label>
             <table class="table table-orange">
               <thead>
               <tr>
                 <td style="width:25px;">ID</td>
                 <td style="width:300px;text-align:center;">Task</td>
                 <td style="width:200px;text-align:center;">Target</td>
                 <td style="width:25px;text-align:center;">Status</td>
                 <td style="width:40px;text-align:center;">Deadline</td>
                 <td style="width:200px;text-align:center;">Keterangan</td>
                 <td style="width:15px;text-align:center;">Proses</td>
                 <td style="width:15px;text-align:center;">Tunda</td>
                 <td style="width:15px;text-align:center;">Selesai</td>
               </tr>
               </thead>
               <tbody>
                 <?php $i=0;?>
                 @foreach($proker_dari_vp as $program)
                 <?php $i++;
                 $now = Carbon\Carbon::now();
                 $date = Carbon\Carbon::parse($program->due_date);
                 $due_date = $date->diffInDays($now);
                 ?>
                 <tr>
                   <td>{{$i}}</td>
                   <td>{{$program->program_kerja}}</td>
                   <td>{{$program->target}}</td>
                   @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Ditolak")
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
                   @if($due_date <=3)
                   <td><div class="tx-danger"><strong>{{$due_date}} Days</strong></div></td>
                   @else
                   <td><div class="tx-success"><strong>{{$due_date}} Days</strong></div></td>
                   @endif
                   <td>{{$program->keterangan}}</td>
                   @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Diperingatkan" || $program->status_proker == "Ditolak")
                   <form method="post" action="{{route('deputy-vice-president.proses',$program->id)}}">
                     @method('PATCH')
                     @csrf
                   <td style="width:15px;text-align:center;"><button class="btn btn-outline-info">Proses</button></td>
                  </form>
                   <td style="width:15px;text-align:center;"><button disabled class="btn btn-outline-warning">Tunda</button></td>
                   <td style="width:15px;text-align:center;"><button disabled class="btn btn-outline-success">Selesai</button></td>
                   @elseif($program->status_proker == "Terlambat" || $program->status_proker == "Sedang Diproses" || $program->status_proker == "Ditunda" || $program->status_proker == "Konfirmasi Dibatalkan" )
                   <td style="width:15px;text-align:center;"><button disabled class="btn btn-outline-info">Proses</button></td>
                   <form method="get" action="{{route('deputy-vice-president.tunda-page',$program->id)}}">
                     @csrf
                   <td style="width:15px;text-align:center;"><button class="btn btn-outline-warning">Tunda</button></td>
                  </form>
                   <form method="get" action="{{route('deputy-vice-president.selesai-page',$program->id)}}">
                     @csrf
                   <td style="width:15px;text-align:center;"><button class="btn btn-outline-success">Selesai</button></td>
                  </form>
                   @elseif($program->status_proker == "Konfirmasi Selesai")
                   <td style="width:15px;text-align:center;"><button disabled class="btn btn-outline-info">Proses</button></td>
                   <form method="post" action="{{route('deputy-vice-president.batal-selesai',$program->id)}}">
                     @csrf
                     @method('PATCH')
                   <td style="width:15px;text-align:center;"><button class="btn btn-outline-warning">Batal Selesai</button></td>
                  </form>
                   <td style="width:15px;text-align:center;"><button disabled class="btn btn-outline-success">Selesai</button></td>
                   @elseif($program->status_proker == "Selesai" || $program->status_proker == "Dibatalkan")
                   <td style="width:15px;text-align:center;"><button disabled class="btn btn-outline-info">Proses</button></td>
                   <td style="width:15px;text-align:center;"><button disabled class="btn btn-outline-warning">Tunda</button></td>
                   <td style="width:15px;text-align:center;"><button disabled class="btn btn-outline-success">Selesai</button></td>
                   @endif
                 </tr>
                 @endforeach
               </tbody>
             </table>

             <label class="section-title">Task List Team Anda</label>
             <table class="table table-orange">
               <thead>
               <tr>
                 <td style="width:25px;">ID</td>
                 <td style="width:300px;text-align:center;">Task</td>
                 <td style="width:50px;text-align:center;">Penanggung Jawab</td>
                 <td style="width:25px;text-align:center;">Status</td>
                 <td style="width:200px;text-align:center;">Keterangan</td>
                 <td style="width:25px;text-align:center;">Konfirmasi</td>
                 <td style="width:25px;text-align:center;">Tolak</td>
                 <td style="width:25px;text-align:center;">Batalkan</td>
               </tr>
               </thead>
               <tbody>
                 <?php $i=0;?>
                 @foreach($proker_dvp as $program)
                 <?php $i++;?>
                 <tr>
                   <td>{{$i}}</td>
                   <td>{{$program->program_kerja}}</td>
                   <td><?php $user= App\User::where('nipp',$program->nipp_pj)->first(); if(!empty($user->nama)){echo $user->nama;}else{echo "Not Yet Assigned";};?></td>
                   @if($program->status_task == "Belum Disampaikan" || $program->status_task == "Belum Direspon")
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
                   <td>{{$program->keterangan}}</td>
                   @if($program->status_task == "Belum Direspon" || $program->status_task == "Sedang Diproses" || $program->status_task == "Diperingatkan")
                   <td><button disabled class="btn btn-outline-success">Konfirmasi</button></td>
                   <td><button disabled class="btn btn-outline-warning">Tolak</button></td>
                   <form method="get" action="{{route('vice-president.batalkan-page',$program->id)}}">
                     @csrf
                   <td><button class="btn btn-outline-danger">Batalkan</button></td>
                  </form>
                   @elseif($program->status_task == "Terlambat" || $program->status_task == "Ditunda" || $program->status_task == "Konfirmasi Dibatalkan")
                   <td><button disabled class="btn btn-outline-success">Konfirmasi</button></td>
                   <form method="get" action="{{route('vice-president.peringatkan-page',$program->id)}}">
                     @csrf
                   <td><button class="btn btn-outline-warning">Peringatkan</button></td>
                  </form>
                   <form method="get" action="{{route('vice-president.batalkan-page',$program->id)}}">
                     @csrf
                   <td><button class="btn btn-outline-danger">Batalkan</button></td>
                  </form>
                   @elseif($program->status_task == "Konfirmasi Selesai")
                   <form method="post" action="{{route('vice-president.konfirmasi',$program->id)}}">
                     @method('PATCH')
                     @csrf
                   <td><button class="btn btn-outline-success">Konfirmasi</button></td>
                  </form>
                  <form method="get" action="{{route('vice-president.reject-page',$program->id)}}">
                    @csrf
                   <td><button class="btn btn-outline-warning">Tolak</button></td>
                  </form>
                   <td><button disabled class="btn btn-outline-danger">Batalkan</button></td>
                   @elseif($program->status_task == "Selesai" || $program->status_task == "Dibatalkan" || $program->status_task == "Belum Disampaikan")
                   <td><button disabled class="btn btn-outline-success">Konfirmasi</button></td>
                   <td><button disabled class="btn btn-outline-warning">Tolak</button></td>
                   <td><button disabled class="btn btn-outline-danger">Batalkan</button></td>
                   @endif
                 </tr>
                 @endforeach
               </tbody>
             </table>
             <br><hr>
             <div class="row">
               <div class="col-6">
                 <label class="section-title">Logbook Harian</label>
                 <hr>
                 <table class="table table-orange">
                   <thead>
                     <tr>
                       <th>No.</th>
                       <th>Program Kerja Terkait</th>
                       <th>Target</th>
                       <th>Log Hari Ini</th>
                       <th>Status</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php $i=0;?>
                     @foreach($logbook_harian as $log)
                     <?php $i++;?>
                     <tr>
                       <td>{{$i}}</td>
                       <td>{{$log->program_kerja_terkait}}</td>
                       <td>{{$log->target}}</td>
                       <td>{{$log->logbook}}</td>
                       @if($log->status == "Selesai")
                       <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$log->status}}</span></td>
                       @elseif($log->status = "Ditunda")
                       <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$log->status}}</span></td>
                       @else
                       <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$log->status}}</span></td>
                       @endif
                     </tr>
                     @endforeach
                   </tbody>
                 </table>
               </div>
               <div class="col-6">
                 <label class="section-title">Performa Anda</label>
                 <hr>
                 <ul class="list-group">
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Jumlah Pekerjaan Minggu ini:</strong><br> <span class="text-muted" style="text-align:right;">8</span></p>
                  </li>
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Jumlah Pekerjaan Terlambat Minggu ini:</strong><br> <span class="text-muted" style="text-align:right;">1</span></p>
                  </li>
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Performa Minggu ini:</strong><br> <span class="tx-success align-right">87.5%</span></p>
                  </li>
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Performa Bulan ini:</strong><br> <span class="text-success align-right">87.5%</span></p>
                  </li>
                  <li class="list-group-item">
                    <p class="mg-b-0"><strong class="tx-inverse tx-medium">Lihat Logbook:</strong><br> <span class="text-muted"><a href="{{url('logbook-harian')}}">Harian</a></span> <span class="text-muted">|
                      <a href="{{url('download-logbook-mingguan')}}">Mingguan</a></span>|
                      <a href="{{url('download-logbook-bulanan')}}">Bulanan</a></p>
                  </li>
                </ul>
               </div>
             </div>
             <!-- ################## MODAL 1 ###################### -->
             <div class="modal fade" id="assigntasktoofficer" tabindex="-1" role="dialog" aria-labelledby="assigntask" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h6 class="modal-title" id="ConfigUpdateLabel">Berikan Tugas ke Officer</h6>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <div class="form-layout">
                       <div class="row mg-b-25">
                         <div class="col-12">
                           <div class="form-group">
                             <form method="post" action="{{route('assign-task-to-officer')}}">
                              @csrf
                             <label class="form-control-label">Program Kerja Anda <span class="tx-danger">*</span></label>
                             <select name="id" class="form-control select2" data-placeholder="Choose one">
                               @foreach($proker_dvp as $program)
                               <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                               @endforeach
                             </select>
                           </div>
                         </div>
                         <div class="col-12">
                           <div class="form-group">
                             <label class="form-control-label">Target: <span class="tx-danger">*</span></label>
                             <textarea class="form-control" type="text" name="target"></textarea>
                           </div>
                         </div>
                         <div class="col-12">
                           <div class="form-group">
                             <label class="form-control-label">Officer Anda <span class="tx-danger">*</span></label>
                             <select name="nipp_pj" class="form-control select2" data-placeholder="Choose one">
                               @foreach($officer as $user)
                               <option value="{{$user->nipp}}">{{$user->nama}}</option>
                               @endforeach
                             </select>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="modal-footer" style="text-align:right;">
                     <button type="submit" class="btn btn-primary bd-0">Tambahkan</button>
                     <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancel</button>
                      </form>
                     <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                   </div>
                 </div>
               </div><!-- modal-dialog -->
             </div><!-- modal -->
             <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
             <!--                               UNTUK KELAS OFFICER & TNO                                  -->
             <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
             @else
             <label class="section-title">Daily Logbook</label>
             <button type="button"class="btn float-right" data-toggle="modal" data-target="#tambahlogbook">Tambahkan </button>
             <p class="mg-b-20 mg-sm-b-40">Tuliskan Pekerjaan Anda Hari Ini</p>

             <table class="table table-orange">
               <thead>
               <tr>
                 <td>ID</td>
                 <td>Task</td>
                 <td>Target</td>
                 <td>Deadline</td>
               </tr>
               </thead>
             </table>
             <br>
             <hr>
             <div class="row">
               <div class="col">
                 <label class="section-title">Upcoming Task</label>
                 <table class="table table-orange">
                   <thead>
                   <tr>
                     <td>ID</td>
                     <td>Task</td>
                     <td>Target</td>
                     <td>Deadline</td>
                   </tr>
                   </thead>
                 </table>
               </div>
               <div class="col">
                 <label class="section-title">Pending Tasks</label>
                 <table class="table table-orange">
                   <thead>
                   <tr>
                     <td>ID</td>
                     <td>Task</td>
                     <td>Target</td>
                     <td>Deadline</td>
                   </tr>
                   </thead>
                 </table>
               </div>
             </div>
             @endif
                   <div class="modal fade" id="tambahlogbook" tabindex="-1" role="dialog" aria-labelledby="ConfigUpdateLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h6 class="modal-title" id="ConfigUpdateLabel">Tambahkan Logbook Harian</h6>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body">
                           <div class="form-layout">
                             <div class="row mg-b-25">
                               <div class="col-12">
                                 <div class="form-group">
                                   <form method="post" action="{{route('logbook.store')}}">
                                    @csrf
                                   <label class="form-control-label">Program Kerja Terkait <span class="tx-danger">*</span></label>
                                   <select name="id" class="form-control select2" data-placeholder="Choose one">
                                     @foreach($proker_dari_vp as $program)
                                     <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                     @endforeach
                                   </select>
                                 </div>
                               </div>
                               <div class="col-12">
                                 <div class="form-group">
                                   <label class="form-control-label">Target: <span class="tx-danger">*</span></label>
                                   <textarea class="form-control" type="text" name="target"></textarea>
                                 </div>
                               </div>
                               <div class="col-12">
                                 <div class="form-group">
                                   <label class="form-control-label">Log Hari ini: <span class="tx-danger">*</span></label>
                                   <textarea class="form-control" type="text" name="log"></textarea>
                                 </div>
                               </div>
                               <div class="col-12">
                                 <div class="form-group">
                                   <label class="form-control-label">Status <span class="tx-danger">*</span></label>
                                   <select name="status" class="form-control select2" data-placeholder="Choose one">
                                     <option>Selesai</option>
                                     <option>Ditunda</option>
                                     <option>Dibatalkan</option>
                                   </select>
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                         <div class="modal-footer" style="text-align:right;">
                           <button type="submit" class="btn btn-primary bd-0">Tambahkan</button>
                           <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancel</button>
                            </form>
                           <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                         </div>
                       </div>
                     </div><!-- modal-dialog -->
                   </div><!-- modal -->
           </div><!-- section-wrapper -->
     </div><!-- Container -->
</div><!--slim-mainpanel-->

<!-- coding endss here  -->
@stop
