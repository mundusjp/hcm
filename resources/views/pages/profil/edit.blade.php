@extends('layouts.ubah')

@section('content')
<!-- coding starts here  -->
<div class="slim-mainpanel">
     <div class="container">
       <div class="slim-pageheader">
         <ol class="breadcrumb slim-breadcrumb">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item"><a href="#">Profile</a></li>
           <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
         </ol>
         <h6 class="slim-pagetitle">Edit Profile</h6>
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
         <form method="post" action="{{ route('update-password', $user->id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
       </div>
     </div>
</div>
<!-- coding endss here  -->
@stop
