@extends('layouts.ubah')

@section('content')
<!-- Start Coding here -->
<div class="slim-mainpanel">
      <div class="container">
        <div class="section-wrapper">
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
            <div class="form-layout-footer">
              <button type="submit" class="btn bd-0">Ubah</button> <br>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div> <!-- Wrapeer -->
      </div> <!-- container -->
</div>
<!-- Coding stops here  -->
@stop
