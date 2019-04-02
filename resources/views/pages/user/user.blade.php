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
         <label class="section-title">User List</label>
         <p class="mg-b-20 mg-sm-b-40">Berikut adalah list user beserta tugas-tugasnya</p>
         <table class="table table-orange">
           <thead>
           <tr>
             <td>ID</td>
             <td>Nama</td>
             <td>Jabatan</td>
             <td>Divisi</td>
             <td>Actions</td>
           </tr>
           </thead>
           <tbody>
             @foreach($users as $user)
             <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->nama}}</td>
               <td>{{$user->jabatan}}</td>
               <td>{{$user->divisi}}</td>
               <td><a href="{{ route('users.edit',$user->id)}}">Detail</a></td>
             </tr>
           @endforeach
         </table>
         {{ $users->links() }}
       </div>
     </div>
</div>
<!-- coding endss here  -->
@stop
