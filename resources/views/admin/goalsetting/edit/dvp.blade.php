@extends('layouts.admin')

@section('content')
<!-- coding starts here  -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Ubah Program Kerja DVP</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Ubah Proker DVP</li>
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
                    <strong class="card-title">Ubah Proker DVP</strong>
                </div>
                <div class="card-body">
                  <form action="{{route('deputy-vice-president.update', $program->id)}}" method="post">
                    @method('PATCH')
                  {{ csrf_field() }}
                  <div class="form-layout">
                    <div class="row mg-b-25">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="nama" readonly value="{{$user->nama}}" >
                        </div>
                      </div><!-- col-6 -->
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-control-label">Sub-Subdivisi: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" readonly name="divisi" value="{{$program->sub_subdivisi}}">
                        </div>
                      </div><!-- col-3 -->
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-control-label">NIPP: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" readonly name="nipp" value="{{$program->nipp}}">
                        </div>
                      </div><!-- col-3 -->
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                          <textarea required name="proker" class="form-control" type="text">{{$program->program_kerja}}</textarea>
                        </div>
                      </div><!-- col-3 -->
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label for="from" class="form-control-label">Tanggal Mulai <span class="tx-danger">*</span></label><br>
                            <input required name="from" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd" value="{{$program->mulai}}">
                        </div>
                      </div><!-- col-6 -->
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label for="to" class="form-control-label">Tanggal Berakhir <span class="tx-danger">*</span></label><br>
                            <input required name="to" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd" value="{{$program->berakhir}}">
                        </div>
                      </div><!-- col-6 -->
                    </div><!-- row -->
                    <div class="form-layout-footer">
                      <div class="justifier" style="text-align:right;">
                      <button type="submit" class="btn btn-outline-success">Ubah</button>
                      </div>
                      </form>
                </div>
            </div>
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
