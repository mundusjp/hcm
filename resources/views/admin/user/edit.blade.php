@extends('layouts.admin')

@section('content')
<!-- coding starts here  -->
<div class="content">
  <!-- Animated -->
  <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <strong class="card-title">Edit User</strong>
                </div>
                <div class="card-body">
                    <label class="section-title">User Profile</label>
                    <form method="post" action="{{ route('users.update', $user_detail->id) }}" enctype="multipart/form-data">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                     <div class="col-6">
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
                         <input type="password" class="form-control" name="password" />
                       </div>
                     </div>
                     <div class="col-6">
                       <div class="form-group">
                         <div class="row">
                           <div class="col-4">
                             <img class="user-avatar rounded-circle" src="{{$user_detail->avatar}}" alt="User Avatar">
                           </div>
                           <div class="col-8">
                             <label for="quantity">Profile Picture</label>
                             <input required type="file" name="file" accept="image/jpeg,image/x-png">
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                    <div class="justifier" style="text-align:right;">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                 </form>
              </div>
            </div>

        </div>

      </div>
  <!-- /#add-category -->
  </div>
  <!-- .animated -->
</div>
<!-- /.content -->
<!-- coding endss here  -->
@stop
