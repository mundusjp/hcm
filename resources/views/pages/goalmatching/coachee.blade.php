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
         <div class="form-group mg-b-10-force">
           <label class="section-title">Pertanyaan 2 Mingguan</label>
           <p class="mg-b-20 mg-sm-b-40">Silahkan Isi Kuesioner di Bawah Ini</p>
               <table class="table table-orange">
                 <thead>
                 <tr>
                   <td>No</td>
                   <td>Pertanyaan</td>
                   <td style="text-align:center;">sudah</td>
                   <td style="text-align:center;">belum</td>
                 </tr>
                 </thead>
                 <tbody>
                   <?php $i=0; ?>
                   <form action="" method="post">
                  @foreach($pertanyaan as $tanya)
                  <?php $i++; ?>
                 <tr>
                   <td>{{$i}}</td>
                   <td>{{$tanya->pertanyaan}}</td>
                   <td style="text-align:center;">
                       <input name="jawaban{{$i}}" id="sudah" type="checkbox">
                   </td>
                   <td style="text-align:center;">
                       <input name="jawaban{{$i}}" id="belum" type="checkbox">
                   </td>
                 </tr>
                </tbody>
                 @endforeach
               </table>
               <div class="justifier" style="text-align:right;">
                 <button class="btn btn-warning" type="submit">Submit</button>
               </div>
              </form>
           </div><!-- section-wrapper -->
     </div><!-- Container -->
</div><!--slim-mainpanel-->

<!-- coding endss here  -->
@stop
