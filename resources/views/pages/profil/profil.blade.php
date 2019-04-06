@extends('layouts.default')

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
          <div class="col-lg-8">
            <div class="card card-profile">
              <div class="card-body">
                <div class="media">
                  <img src="{{Auth::user()->avatar}}" alt="">
                  <div class="media-body">
                    <h3 class="card-profile-name">{{Auth::user()->avatar}}</h3>
                    <p class="card-profile-position">{{Auth::user()->jabatan}} at <a href="https://indonesiacarterminal.co.id">{{App\Company::find(1)->nama</a></p>
                    <p>Jakarta Utara, Indonesia</p>
                    <p class="mg-b-0">{{Auth::user()->komentar}}</p>
                  </div><!-- media-body -->
                </div><!-- media -->
              </div><!-- card-body -->
              <div class="card-footer">
                <a href="" class="card-profile-direct">http://thmpxls.me/profile?id=katherine</a>
                <div>
                  <a href="">Edit Profile</a>
                  <a href="">Profile Settings</a>
                </div>
              </div><!-- card-footer -->
            </div><!-- card -->
         <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
         <!--                               UNTUK KELAS LAINNYA                                        -->
         <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
           </div><!-- section-wrapper -->
     </div><!-- Container -->
</div><!--slim-mainpanel-->

<!-- coding endss here  -->
@stop
