@extends('layouts.admin')

@section('content')
<!-- coding starts here  -->
<style>
.isDisabled {
  cursor: not-allowed;
  opacity: 0.5;
}
.isDisabled > a {
  color: currentColor;
  display: inline-block;  /* For IE11/ MS Edge bug */
  pointer-events: none;
  text-decoration: none;
}
</style>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Log Harian DVP</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Logbook - DVP</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-12">
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
            </div>
        </div>
    </div>
</div>
<div class="content">
  <!-- Animated -->
  <div class="animated fadeIn">
      <!-- Widgets  -->

      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">List DVP</strong>
                </div>
                <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Jabatan</th>
                              <th>Divisi</th>
                              <th>Status</th>
                              <th>Harian</th>
                              <th>Mingguan</th>
                              <th>Bulanan</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; ?>
                        @foreach($yangsudah as $rajin)
                        <?php $i++;
                        $sudah = App\User::where('nipp',$rajin)->first();
                        ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$user->nama}}</td>
                            <td>{{$user->jabatan}}</td>
                            <td>{{$user->sub_divisi}}</td>
                            <td><strong style="color:green;">Sudah Mengisi</strong></td>
                            <td><a class="btn btn-outline-warning" href="{{route('superadmin.log.harian.dvp',$user->id)}}">Harian</a></td>
                            <td><a class="btn btn-outline-warning" href="{{route('superadmin.log.mingguan.dvp',$user->id)}}">Mingguan</a></td>
                            <td><a class="btn btn-outline-warning" href="{{route('superadmin.log.bulanan.dvp',$user->id)}}">Bulanan</a></td>
                        </tr>
                        @endforeach
                        @foreach($yangbelum as $pemalas)
                        <?php $i++;
                        $belum = App\User::where('nipp',$pemalas)->first();
                         ?>
                          <tr>
                              <td>{{$i}}</td>
                              <td>{{$belum->nama}}</td>
                              <td>{{$belum->jabatan}}</td>
                              <td>{{$belum->sub_divisi}}</td>
                              <td><strong style="color:red;">Belum Mengisi</strong></td>
                              <td><span class="isDisabled"><a  class="btn btn-outline-warning" href="">Harian</a></span></td>
                              <td><span class="isDisabled"><a  class="btn btn-outline-warning" href="">Mingguan</a></span></td>
                              <td><span class="isDisabled"><a  class="btn btn-outline-warning" href="">Bulanan</a></span></td>
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
