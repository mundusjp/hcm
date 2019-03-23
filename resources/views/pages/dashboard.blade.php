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
             <button type="button"class="btn float-right">Tambahkan </button>
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
           </div><!-- section-wrapper -->
     </div><!-- Container -->
</div><!--slim-mainpanel-->

<!-- coding endss here  -->
@stop
