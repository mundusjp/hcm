@extends('layouts.ubah')

@section('content')
<!-- coding starts here  -->
<div class="slim-mainpanel">
     <div class="container">
       <div class="slim-pageheader">
         <ol class="breadcrumb slim-breadcrumb">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active" aria-current="page">My Profile</li>
         </ol>
         <h6 class="slim-pagetitle">My Profile</h6>
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
         <!--                             UNTUK KELAS SUPERADMIN                                       -->
         <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
         <div class="row row-sm">
          <div class="col-lg-12">
            <div class="card card-profile">
              <div class="card-body">
                <div class="media">
                  <a href=""><img src="{{Auth::user()->avatar}}" alt=""></a>
                  <div class="media-body">
                    <h3 class="card-profile-name">{{Auth::user()->nama}}</h3>
                    <p class="card-profile-position">{{Auth::user()->jabatan}} at <a href="https://indonesiacarterminal.co.id">{{App\Company::find(1)->nama}}</a></p>
                    <p>Jakarta Utara, Indonesia</p>
                    <p class="mg-b-0">{{Auth::user()->komentar}}</p>
                  </div><!-- media-body -->
                </div><!-- media -->
              </div>
              <div class="card-body" style="text-align:left;">
                <hr>
                <div class="row">
                  <div class="col-6">
                    <label class="section-title">Detail Profil</label>
                    <hr>
                    <form method="post" action="{{ route('update-profile', $user->id)}}">
                       @method('PATCH')
                       @csrf
                       <div class="form-group">
                         <label for="nama">Nama:</label>
                         <input type="text" class="form-control" name="nama" value="{{ $user->nama }}" />
                       </div>
                       <div class="form-group">
                         <label for="email">E-mail :</label>
                         <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
                       </div>
                       <div class="form-group">
                         <label style="text-align:left;" for="quantity">Caption</label>
                         <textarea type="text" class="form-control" name="komentar" value="{{ $user->komentar }}" />{{ $user->komentar }}</textarea>
                       </div>
                       <hr>
                       <div class="justifier" style="text-align:right;">
                         <button type="submit" class="btn btn-primary">Update</button>
                       </div>
                     </form>
                  </div>
                  <div class="col-6">
                    <label class="section-title">Profile Picture</label>
                    <hr>
                    <form enctype="multipart/form-data" action="{{route('upload-pp')}}" method="post">
                      @csrf
                      <input required type="file" name="file" accept="image/jpeg">
                      <button class="btn btn-primary float-right">Upload</button>
                    </form>
                    <hr>
                      <label class="section-title">Ubah Password</label>
                      <form method="post" action="{{ route('update-password', $user->id)}}">
                         @method('PATCH')
                         @csrf
                         <div class="form-group">
                             <label for="password">New Password</label>
                                 <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                 @if ($errors->has('password'))
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $errors->first('password') }}</strong>
                                     </span>
                                 @endif
                         </div>
                         <div class="form-group">
                             <label for="password-confirm">Confirm New Password</label>
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                         </div>
                         <hr>
                         <div class="justifier" style="text-align:right;">
                           <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                       </form>
                  </div>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
         <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
         <!--                               UNTUK KELAS LAINNYA                                        -->
         <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
           </div><!-- section-wrapper -->
     </div><!-- Container -->
</div><!--slim-mainpanel-->

<!-- coding endss here  -->
@stop
