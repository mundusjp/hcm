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
         <label class="section-title">Officer Anda</label>
         <div class="form-group mg-b-10-force">
           <label class="form-control-label">List Officer Anda:</label>
           <select class="form-control select" name="media_source">
             @foreach($officer as $row)
             <?php
               $officer = $row->nama;
               echo "<option  value=\"{$officer}\">{$officer}</option>";
              ?>
             @endforeach
           </select>
         </div>
    </div><!-- section-wrapper -->
  </div><!-- Container -->
</div><!--slim-mainpanel-->

<!-- coding endss here  -->
@stop
