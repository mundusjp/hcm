@extends('layouts.admin')

@section('content')
<!-- coding starts here  -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
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
                    <strong class="card-title">Data Table</strong>
                </div>
                <div class="card-body">
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
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Divisi</th>
                                <th>Detail</th>
                                <th>Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i=0; ?>
                          @foreach($users as $user)
                          <?php $i++; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->jabatan}}</td>
                                <td>{{$user->sub_divisi}}</td>
                                <td><button class="btn btn-outline-warning">Detail</button></td>
                                <form action="{{route('users.edit',$user->id)}}" method="get">
                                  @csrf
                                <td><button class="btn btn-outline-info">Edit</button></td>
                                </form>
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
