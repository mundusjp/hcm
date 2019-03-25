@extends('layouts.default')

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
