@extends('layouts.ubah')

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
         <label class="section-title">User List</label>
         <p class="mg-b-20 mg-sm-b-40">Berikut adalah list user beserta tugas-tugasnya</p>
         <form method="post" action="{{ route('users.update', $user_detail->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="text" class="form-control" name="nama" value="{{ $user_detail->nama }}" />
        </div>
        <div class="form-group">
          <label for="email">E-mail :</label>
          <input type="text" class="form-control" name="email" value="{{ $user_detail->email }}" />
        </div>
        <div class="form-group">
          <label for="quantity">Password</label>
          <input type="password" class="form-control" name="password" value="{{ $user_detail->password }}" />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
       </div>
     </div>
</div>
<!-- coding endss here  -->
@stop
