@extends('layouts.ubah')

@section('content')
<!-- Start Coding here -->
<div class="slim-mainpanel">
      <div class="container">
        <div class="section-wrapper">
          <form action="{{route('vice-president.update',$program->id)}}" method="post">
          @method('PATCH')
          {{ csrf_field() }}
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="nama" readonly value="{{Auth::user()->nama}}" >
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Sub-Divisi: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" readonly name="divisi" value="{{$program->divisi}}">
                </div>
              </div><!-- col-3 -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">NIPP: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" readonly name="nipp" value="{{$program->nipp}}">
                </div>
              </div><!-- col-3 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Program Direksi Terkait <span class="tx-danger">*</span></label>
                  <select name="program_direksi" class="form-control select2-show-search" data-placeholder="Choose one">
                    <option value="{{$program->id_prodir}}">{{$program->program_direksi}}</option>
                    @foreach($direksi as $program)
                    <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Program Kerja Terkait <span class="tx-danger">*</span></label>
                  <select name="program_kerja_terkait" class="form-control select2-show-search" data-placeholder="Choose one">
                    @if(empty($program->program_kerja_terkait))
                    <option value="">Tidak Ada</option>
                    @else
                    <option value="{{$program->id_prokerkait}}">{{$program->program_kerja_terkait}}</option>
                    @endif
                    <optgroup label="Program Tahunan">
                      @foreach($proker_tahunan as $program)
                      <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                      @endforeach
                    </optgroup>
                    <optgroup label="Program 1/2 Tahunan">
                      @foreach($proker_settahunan as $program)
                      <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                      @endforeach
                    </optgroup>
                    <optgroup label="Program Bulanan">
                      @foreach($proker_bulanan as $program)
                      <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                      @endforeach
                    </optgroup>

                  </select>
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                  <textarea required name="proker" class="form-control" type="text">{{$program->program_kerja}}</textarea>
                </div>
              </div><!-- col-9 -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Kategori <span class="tx-danger">*</span></label>
                  <select name="kategori" class="form-control select2-show-search" data-placeholder="Choose one">
                    <option value="1">Mingguan</option>
                    <option value="2">Bulanan</option>
                    <option value="3">1/2 Tahunan</option>
                    <option value="4">Tahunan</option>
                  </select>
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
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div> <!-- Wrapeer -->
      </div> <!-- container -->
</div>
<!-- Coding stops here  -->
@stop
