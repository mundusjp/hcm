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
                    <strong class="card-title">Ubah Visi Misi</strong>
                </div>
                <div class="card-body">
                  <form action="{{route('perusahaan.update',$visimisi->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('PATCH')
                  <div class="form-layout">
                    <div class="row mg-b-25">
                      <div class="col-lg-8">
                        <div class="form-group">
                          @if($visimisi->visi == null)
                          <label class="form-control-label">Misi: <span class="tx-danger">*</span></label>
                          <textarea class="form-control" type="text" name="misi" value="{{$visimisi->misi}}">{{$visimisi->misi}}</textarea>
                          @else
                          <label class="form-control-label">Visi: <span class="tx-danger">*</span></label>
                          <textarea class="form-control" type="text" name="visi" value="{{$visimisi->visi}}">{{$visimisi->visi}}</textarea>
                          @endif
                        </div>
                      </div><!-- col-8 -->
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Tahun: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="tahun" value="{{$visimisi->tahun}}">
                        </div>
                      </div><!-- col-4 -->
                    </div><!-- row -->
                    <div class="form-layout-footer" style="text-align:right;">
                      <button type="submit" class="btn btn-success">Ubah</button> <br>
                    </div><!-- form-layout-footer -->
                  </div><!-- form-layout -->
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
