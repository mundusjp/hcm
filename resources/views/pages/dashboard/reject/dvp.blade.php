@extends('layouts.ubah')

@section('content')
<!-- Start Coding here -->
<div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">Tolak Program Kerja Deputy Vice President</h6>
        </div><!-- slim-pageheader -->
        <div class="section-wrapper">
          <form action="{{route('vice-president.reject',$program->id)}}" method="post">
          @method('PATCH')
          {{ csrf_field() }}
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Program yang Ditolak <span class="tx-danger">*</span></label>
                  <textarea class="form-control" type="text" name="keterangan" readonly>{{$program->program_kerja}}</textarea>
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Alasan Penolakan <span class="tx-danger">*</span></label>
                  <textarea required class="form-control" type="text" name="keterangan"></textarea>
                </div>
              </div><!-- col-6 -->
            </div><!-- row -->
            <div class="form-layout-footer">
              <div class="justifier" style="text-align:right;">
              <button type="submit" class="btn btn-outline-danger">Tolak</button><br><br>
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
