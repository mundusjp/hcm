@extends('layouts.admin')

@section('content')
<!-- coding starts here  -->
<div class="content">
  <!-- Animated -->
  <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                  <a href="{{route('superadmin.user')}}">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{$users}}</span></div>
                                <div class="stat-heading">Jumlah User</div>
                            </div>
                        </div>
                    </div>
                  </a>
                </div>
            </div>
        </div>

          <div class="col-lg-6 col-md-6">
              <div class="card">
                  <div class="card-body">
                      <div class="stat-widget-five">
                          <div class="stat-icon dib flat-color-1">
                              <i class="fa fa-book"></i>
                          </div>
                          <div class="stat-content">
                              <div class="text-left dib">
                                  <div class="stat-text"><span class="count">{{$yangbelum_count}}</span> User</div>
                                  <div class="stat-heading">Belum isi log harian</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <strong class="card-title">Belum mengisi Log Harian</strong>
                </div>
                <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Jabatan</th>
                              <th>Divisi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; ?>
                        @foreach($yangbelum as $pemalas)
                        <?php $i++;
                        $user = App\User::where('nipp',$pemalas)->first();
                         ?>
                          <tr>
                              <td>{{$i}}</td>
                              <td>{{$user->nama}}</td>
                              <td>{{$user->jabatan}}</td>
                              <td>{{$user->sub_divisi}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
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
