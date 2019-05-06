@extends('layouts.admin')

@section('content')
<!-- coding starts here  -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Ubah Program Kerja VP</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Ubah Proker VP</li>
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
                    <strong class="card-title">Ubah Proker VP</strong>
                </div>
                <div class="card-body">
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
                            @foreach($direksi as $programs)
                            <option value="{{$program->id}}">{{$programs->program_kerja}}</option>
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
                            <optgroup label="Program Mingguan">
                              @foreach($proker_mingguan as $programs)
                              <option value="{{$program->id}}">{{$programs->program_kerja}}</option>
                              @endforeach
                            </optgroup>
                            <optgroup label="Program Bulanan">
                              @foreach($proker_bulanan as $programs)
                              <option value="{{$program->id}}">{{$programs->program_kerja}}</option>
                              @endforeach
                            </optgroup>
                            <optgroup label="Program Tahunan">
                              @foreach($proker_tahunan as $programs)
                              <option value="{{$program->id}}">{{$programs->program_kerja}}</option>
                              @endforeach
                            </optgroup>


                          </select>
                        </div>
                      </div><!-- col-6 -->
                      <div class="col-lg-10">
                        <div class="form-group">
                          <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                          <textarea required name="proker" class="form-control" type="text">{{$program->program_kerja}}</textarea>
                        </div>
                      </div><!-- col-9 -->
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-control-label">Bobot <span class="tx-danger">*</span></label>
                          <input required name="bobot" class="form-control" type="number" max="100" min="1" value="1">
                        </div>
                      </div><!-- col-9 -->
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
