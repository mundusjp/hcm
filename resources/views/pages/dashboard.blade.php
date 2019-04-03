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
         <label class="section-title">Task List</label>
         <p class="mg-b-20 mg-sm-b-40">Berikut adalah pekerjaan yang harus dilakukan hari ini</p>
             <table class="table table-orange">
               <thead>
               <tr>
                 <td>ID</td>
                 <td>Task</td>
                 <td>Target</td>
                 <td>Deadline</td>
                 <td>Action</td>
               </tr>
               </thead>
               <tbody>
               <tr>
                 <td>1</td>
                 <td>Rapat dengan dewan direksi</td>
                 <td>Mendapatkan approval project</td>
                 <td>Hari ini, 18 Maret 2019</td>
                 <td><a href="" class="text-success">Selesai</a>&nbsp;|&nbsp;<a href="" class="text-danger">Tunda</a></td>

             </table>
             <br>
             <hr>
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
                   <td><span class="badge badge-pill badge-dark">{{$program->status_proker}}</span></td>
                   @elseif($program->status_proker == "Sedang Diproses")
                   <td><span class="badge badge-pill badge-info">{{$program->status_proker}}</span></td>
                   @elseif($program->status_proker == "Pending" || $program->status_proker == "Diperingatkan")
                   <td><span class="badge badge-pill badge-warning">{{$program->status_proker}}</span></td>
                   @elseif($program->status_proker == "Dibatalkan")
                   <td><span class="badge badge-pill badge-danger">{{$program->status_proker}}</span></td>
                   @else
                   <td><span class="badge badge-pill badge-success">Konfirmasi Selesai</span></td>
                   @endif
                   <td>{{$program->keterangan}}</td>
                   @if($program->status_proker == "Belum Direspon" || $program->status_proker == "Sedang Diproses" || $program->status_proker == "Diperingatkan")
                   <td><button disabled class="btn btn-outline-success">Konfirmasi</button></td>
                   <td><button disabled class="btn btn-outline-warning">Tolak</button></td>
                   <form method="get" action="{{route('vice-president.batalkan-page',$program->id)}}">
                     @csrf
                   <td><button class="btn btn-outline-danger">Batalkan</button></td>
                  </form>
                   @elseif($program->status_proker == "Terlambat")
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
                   <td><button class="btn btn-outline-success">Konfirmasi</button></td>
                   <td><button id="reject_vp" class="btn btn-outline-warning ModalClick" data-id="{{$program->id}}" data-toggle="modal" data-target="#tolakdvp">Tolak</button></td>
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
             <hr>
             <!-- ///////////////////////////////////////STATUS DVP////////////////////////////////////////////////  -->
             <label class="section-title">Status Deputy Vice Director</label>
             <p>Berikut adalah status dan performa dari seluruh DVP anda</p>
             <div class="row">
               @foreach($officer_vp as $user)
               <div class="col">
                 <h6 class="tx-orange"><strong>{{$user->nama}}</strong></h6>
                 <ul class="list-group">
                <li class="list-group-item">
                  <p class="mg-b-0"><strong class="tx-inverse tx-medium">Jumlah Pekerjaan Minggu ini:</strong><br> <span class="text-muted" style="text-align:right;">Display</span></p>
                </li>
                <li class="list-group-item">
                  <p class="mg-b-0"><strong class="tx-inverse tx-medium">Jumlah Pekerjaan Pending Minggu ini:</strong><br> <span class="text-muted" style="text-align:right;">Graphics</span></p>
                </li>
                <li class="list-group-item">
                  <p class="mg-b-0"><strong class="tx-inverse tx-medium">Performa Minggu ini:</strong><br> <span class="text-muted align-right">Flash Storage</span></p>
                </li>
                <li class="list-group-item">
                  <p class="mg-b-0"><strong class="tx-inverse tx-medium">Performa Bulan ini:</strong><br> <span class="text-muted align-right">Flash Storage</span></p>
                </li>
                <li class="list-group-item">
                  <p class="mg-b-0"><strong class="tx-inverse tx-medium">Lihat Logbook:</strong><br> <span class="text-muted"><a href="">Harian</a></span> <span class="text-muted">| <a href="">Mingguan</a></span></p>
                </li>
              </ul>

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
                               @foreach($officer_vp as $user)
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

             <!-- ################## MODAL 2 ###################### -->
             <div class="modal fade" id="tolakdvp" tabindex="-1" role="dialog" aria-labelledby="assigntask" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h6 class="modal-title" id="ConfigUpdateLabel">Alasan Tugas Ditolak</h6>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <div class="form-layout">
                       <div class="row mg-b-25">
                         <div class="col-2">
                           <div class="form-group">
                             <label class="form-control-label">ID: <span class="tx-danger">*</span></label>
                             <input id="id_vp" readonly class="form-control" type="text" name="id">
                           </div>
                         </div>
                         <div class="col-10">
                           <div class="form-group">
                             <label class="form-control-label">Program Kerja: <span class="tx-danger">*</span></label>
                             <textarea readonly class="form-control" type="text" name="proker"></textarea>
                           </div>
                         </div>
                         <div class="col-12">
                           <div class="form-group">
                             <form method="post" action="{{route('assign-task-to-dvp')}}">
                              @csrf
                             <label class="form-control-label">Alasan Penolakan (Sertakan Solusi)<span class="tx-danger">*</span></label>
                             <textarea class="form-control" type="text" name="keterangan"></textarea>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="modal-footer" style="text-align:right;">
                     <button type="submit" class="btn btn-primary bd-0">Tolak</button>
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
             <label class="section-title">Dashboard Deputy Vice President of {{Auth::user()->sub_divisi}}</label>

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
                                 <div class="form-group">
                                   <div class="row">
                                     <div class="col-12">
                                       <form id="tambahlogbook" action="" method="post">
                                       {{ csrf_field() }}
                                       <label class="section-title">Left Label Alignment</label>
                                       <p class="mg-b-20 mg-sm-b-40">A basic form where labels are aligned in left.</p>

                                       <div class="form-layout form-layout-4">
                                         <div class="row">
                                           <label class="col-sm-4 form-control-label">Firstname: <span class="tx-danger">*</span></label>
                                           <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                             <input type="text" class="form-control" placeholder="Enter firstname">
                                           </div>
                                         </div><!-- row -->
                                         <div class="row mg-t-20">
                                           <label class="col-sm-4 form-control-label">Lastname: <span class="tx-danger">*</span></label>
                                           <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                             <input type="text" class="form-control" placeholder="Enter lastname">
                                           </div>
                                         </div>
                                         <div class="row mg-t-20">
                                           <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                                           <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                             <input type="text" class="form-control" placeholder="Enter email address">
                                           </div>
                                         </div>
                                         <div class="row mg-t-20">
                                           <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                                           <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                             <textarea rows="2" class="form-control" placeholder="Enter your address"></textarea>
                                           </div>
                                         </div>
                                         <div class="form-layout-footer mg-t-30">

                                         </div><!-- form-layout-footer -->
                                       </div><!-- form-layout -->
                               </div> <!-- form layout -->
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
                     </div><!-- modal-dialog -->
                   </div><!-- modal -->
                 </div>
           </div><!-- section-wrapper -->
     </div><!-- Container -->
</div><!--slim-mainpanel-->

<!-- coding endss here  -->
@stop
