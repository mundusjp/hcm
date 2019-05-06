@extends('layouts.admin')

@section('content')
<!-- coding starts here  -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Visi Misi Perusahaan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Perusahaan</li>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Visi</strong>
                    <button class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#tambahvisi">Tambah</button>
                </div>
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table table-hover mg-b-0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th style="width:350px;">Visi</th>
                          <th>Edit</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; ?>
                        @foreach($visi_perusahaan as $row)
                        <?php $i++; ?>

                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{$row->visi}}</td>
                          <td>
                            <form action="{{route('superadmin.perusahaan.edit', $row->id)}}" method="get">
                            @csrf
                            <button class="btn btn-outline-success" href="#">Ubah</button>
                            </form>
                          </td>
                          <td>
                            <form action="{{route('perusahaan.destroy', $row->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="delete">Hapus</button>
                            </form>
                          </td>
                        </tr>

                         @endforeach
                      </tbody>
                    </table>

                  </div><!-- table-responsive -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Misi</strong>
                    <button class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#tambahmisi">Tambah</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mg-b-0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th style="width:350px;">Misi</th>
                          <th>Edit</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; ?>

                        @foreach($misi_perusahaan as $row)
                        <?php $i++; ?>

                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{$row->misi}}</td>
                          <td>
                            <form action="{{route('superadmin.perusahaan.edit', $row->id)}}" method="get">
                            @csrf
                            <button class="btn btn-outline-success" href="#">Ubah</button>
                            </form>
                          </td>
                          <td>
                            <form action="{{route('perusahaan.destroy', $row->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="delete">Hapus</button>
                            </form>
                          </td>
                        </tr>

                         @endforeach
                      </tbody>
                    </table>

                  </div><!-- table-responsive -->
                </div>
            </div>
        </div>
      </div>
      <div class="modal fade" id="tambahvisi" tabindex="-1" role="dialog" aria-labelledby="ConfigUpdateLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-layout">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-12">
                          <form id="tambahvisi" action="{{route('perusahaan.store')}}" method="post">
                          {{ csrf_field() }}
                          <label class="section-title">Tambahkan Visi Perusahaan</label>
                          <p class="mg-b-20 mg-sm-b-40">Untuk tahun {{date('Y')}}</p>

                          <div class="form-layout form-layout-4">
                            <div class="row">
                              <label class="col-sm-4 form-control-label">Visi Perusahaan: <span class="tx-danger">*</span></label>
                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <textarea required type="text" name="visi" class="form-control" placeholder="Visi"></textarea>
                              </div>
                              <label class="col-sm-4 form-control-label">Tahun: <span class="tx-danger">*</span></label>
                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="tahun" class="form-control" value="{{date('Y')}}"/>
                              </div>
                            </div><!-- row -->
                          </div><!-- form-layout -->
                  </div> <!-- form layout -->
                </div>
              </div>
            </div>
          </div>
            <div class="modal-footer" style="text-align:right;">
              <button type="submit" class="btn btn-primary bd-0">Tambahkan</button>
              <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancel</button>
              <!-- <button type="submit" class="btn btn-primary">Update</button> -->
            </div>
          </form>
        </div><!-- modal-dialog -->
      </div><!-- modal -->
    </div>
      <div class="modal fade" id="tambahmisi" tabindex="-1" role="dialog" aria-labelledby="ConfigUpdateLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-layout">
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <form id="tambahmisi" action="{{route('perusahaan.store')}}" method="post">
                      {{ csrf_field() }}
                      <label class="section-title">Tambahkan Misi Perusahaan</label>
                      <p class="mg-b-20 mg-sm-b-40">Untuk tahun {{date('Y')}}</p>

                      <div class="form-layout form-layout-4">
                        <div class="row">
                          <label class="col-sm-4 form-control-label">Misi Perusahaan: <span class="tx-danger">*</span></label>
                          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <textarea required type="text" name="misi" class="form-control" placeholder="Misi"></textarea>
                          </div>
                          <label class="col-sm-4 form-control-label">Tahun: <span class="tx-danger">*</span></label>
                          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="tahun" class="form-control" value="{{date('Y')}}">
                          </div>
                        </div><!-- row -->
                      </div><!-- form-layout -->
                  </div> <!-- form layout -->
                </div>
              </div>
            </div>
          </div>
            <div class="modal-footer" style="text-align:right;">
              <button type="submit" class="btn btn-primary bd-0">Tambahkan</button>
              <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancel</button>
              <!-- <button type="submit" class="btn btn-primary">Update</button> -->
            </div>
          </form>
        </div><!-- modal-dialog -->
      </div><!-- modal -->
    </div>
  <!-- /#add-category -->
  </div>
  <!-- .animated -->
</div>
<!-- /.content -->
<!-- coding endss here  -->
@stop
