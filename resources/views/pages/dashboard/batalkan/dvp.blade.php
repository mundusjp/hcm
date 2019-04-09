@extends('layouts.ubah')

@section('content')
<!-- Start Coding here -->
<div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">Batalkan Program Kerja Vice President</h6>
        </div><!-- slim-pageheader -->
        <div class="section-wrapper">
          <form action="{{route('vice-president.update',$program->id)}}" method="post">
          @method('PATCH')
          {{ csrf_field() }}
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                  <textarea required name="proker" class="form-control" type="text">{{$program->program_kerja}}</textarea>
                </div>
              </div><!-- col-9 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Alasan Pembatalan <span class="tx-danger">*</span></label>
                  <textarea class="form-control" type="text" name="keterangan"></textarea>
                </div>
              </div><!-- col-6 -->
              <div class="col-7">
                <span> &nbsp; </span>
              </div>
              <div class="col-lg-5">
                <label for="kurangi" class="col-md-12 col-form-label text-md-left">Apakah Anda ingin Mengurangi Performa DVP anda?</label>
                &emsp;
                <label class="checkbox">
                  <input type="checkbox" name="kurangi" class="form-control" value="yes"> Yes
                </label>&emsp;
                <label class="checkbox">
                  <input type="checkbox" name="kurangi" class="form-control" value="no"> No
                </label>
              </div>
            </div><!-- row -->
            <div class="form-layout-footer">
              <div class="justifier" style="text-align:right;">
              <button type="submit" class="btn btn-outline-danger">Batalkan</button><br><br>
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
