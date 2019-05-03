@extends('layouts.ubah')

@section('content')
<!-- Start Coding here -->
<div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">Konfirmasi Selesai Program Kerja Vice President</h6>
        </div><!-- slim-pageheader -->
        <div class="section-wrapper">
          <form action="{{route('deputy-vice-president.selesai',$program->id)}}" method="post" enctype="multipart/form-data">
          @method('PATCH')
          {{ csrf_field() }}
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Program yang Selesai <span class="tx-danger">*</span></label>
                  <textarea class="form-control" type="text" name="keterangan" readonly>{{$program->program_kerja}}</textarea>
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Bukti Penyelesaian <span class="tx-danger">*</span></label>
                  <textarea required class="form-control" type="text" name="keterangan"></textarea>
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">File Penyelesaian <span class="tx-danger">*</span></label>
                  <input required accept="application/pdf,application/vnd.ms-excel,application/msword,image/jpeg,image/x-png" type="file" class="form-control" name="file">
                </div>
              </div>
            </div><!-- row -->
            <div class="form-layout-footer">
              <div class="justifier" style="text-align:right;">
              <button type="submit" class="btn btn-outline-success">Selesaikan</button><br><br>
              </form>
              <form action="{{route('home')}}" method="get">
              <button type="submit" class="btn btn-outline-dark">Kembali</button>
              </form>
              </div>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div> <!-- Wrapeer -->
      </div> <!-- container -->
</div>
<!-- Coding stops here  -->
@stop
