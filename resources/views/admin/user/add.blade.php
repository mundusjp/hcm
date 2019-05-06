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
                  <strong class="card-title">Tambah User</strong>
                </div>
                <div class="card-body">
                    <label class="section-title">User Profile</label>
                    <form id="tambahuser" action="{{route('users.store')}}" method="post">
                   @csrf
                   <div class="row">
                     <div class="col-6">
                       <div class="form-group">
                         <label for="nama">NIPP:</label>
                         <input id="nipp" type="text" class="form-control{{ $errors->has('nipp') ? ' is-invalid' : '' }}" name="nipp" value="{{ old('nipp') }}" required autofocus>
                       </div>
                       <div class="form-group">
                         <label for="nama">Nama:</label>
                         <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>
                       </div>
                       <div class="form-group">
                         <label for="nama">Jabatan:</label>
                         <input id="jabatan" type="text" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" value="{{ old('jabatan') }}" required autofocus>
                       </div>
                       <div class="form-group">
                         <label for="nama">Divisi:</label>
                         <select name="divisi" class="form-control">
                           <option>Utama</option>
                           <option>Operasi</option>
                           <option>Keuangan & SDM</option>
                           <option>Komersial & Pengembangan Bisnis</option>
                           <option>Kepatuhan</option>
                         </select>
                       </div>
                       <div class="form-group">
                         <label for="email">Kelas Jabatan:</label>
                         <input id="kelas_jabatan" type="number" min="2" max="14" class="form-control" name="kelas_jabatan" required autofocus>
                       </div>
                       <div class="form-group">
                         <label for="email">E-mail :</label>
                         <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                       </div>
                       <div class="form-group">
                         <label for="quantity">Password</label>
                         <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                       </div>
                       <div class="form-group">
                         <label for="quantity">Confirm Password</label>
                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                       </div>
                     </div>
                   </div>
                    <div class="justifier" style="text-align:right;">
                      <button type="submit" class="btn btn-primary">Tambahkan</button>
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
