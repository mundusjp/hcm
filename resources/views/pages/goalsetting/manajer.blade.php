@extends('layouts.default')

@section('content')
<!-- coding starts here  -->
    <div class="slim-mainpanel">
          <div class="container">
            <div class="slim-pageheader">
              <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
              </ol>
              <h6 class="slim-pagetitle">Program Vice President</h6>
            </div><!-- slim-pageheader -->
            <div class="section-wrapper">
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
              <label class="section-title">Program Direktur {{$divisi}}</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <td>No</td>
                  <td>Program Kerja</td>
                  @if(($kelas_jabatan <=5)||($jabatan == "Superadmin"))
                  <td>Mulai</td>
                  <td>Berakhir</td>
                  @endif
                </tr>
                </thead>
                <tbody>

                  <?php $i=0;?>
                  @foreach($direksi as $program)
                  <?php $i++;?>
                  <tr>
                  <th style="width:30px"scope="row">{{$i}}</th>
                  <td style="width:500px">{{$program->program_kerja}}</td>
                  @if(($kelas_jabatan <=5)||($jabatan == "Superadmin"))
                  <td style="width:150px">{{$program->mulai}}</td>
                  <td style="width:150px">{{$program->berakhir}}</td>
                  @endif
                    </form>
                </tr>
                @endforeach
              </table>
              <br>
              <hr>
              @if(($kelas_jabatan <=8)||($jabatan == "Superadmin"))
              <button type="button"class="btn float-right" data-toggle="modal" data-target="#tambahmanajer">Tambahkan </button>
              <label class="section-title">Program Anda Sebagai Vice President {{$divisi}}</label>
              @else
              <label class="section-title">Program Vice President {{$divisi}}</label>
              @endif
              <table class="table table-orange">
                <thead>
                <tr>
                  <td>No</td>
                  <td>Program Kerja</td>
                  @if(($kelas_jabatan <=8)||($jabatan == "Superadmin"))
                  <td>Mulai</td>
                  <td>Berakhir</td>
                  <td>Action</td>
                  @endif
                </tr>
                </thead>
                <tbody>

                  <?php $i=0;?>
                  @foreach($proker as $program)
                  <?php $i++;?>
                  <tr>
                  <th style="width:30px" scope="row">{{$i}}</th>
                  <td style="width:500px">{{$program->program_kerja}}</td>
                  @if(($kelas_jabatan <=8)||($jabatan == "Superadmin"))
                  <td style="width:150px">{{$program->mulai}}</td>
                  <td style="width:150px">{{$program->berakhir}}</td>
                  <td>
                    <form id="edit" action="{{route('manajer-edit')}}" method="post">
                    @csrf
                    <input class="form-control" type="text" name="id" style="display:none;" value="{{$program->id}}">
                    <a href="javascript:;" onclick="document.getElementById('edit').submit();" class="text-success">Ubah</a><br>
                    </form>
                    <form id="hapus" action="{{route('manajer-delete')}}" method="post">
                      <input class="form-control" type="text" name="id" style="display:none;" value="{{$program->id}}">
                    @csrf
                    <a class="tx-danger" href="javascript:;" onclick="document.getElementById('hapus').submit();">Hapus</a>
                  </td>
                  </form>
                  @endif
                </tr>
                @endforeach
              </table>
              <div class="modal fade" id="tambahmanajer" tabindex="-1" role="dialog" aria-labelledby="ConfigUpdateLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
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
                              <form id="tambahmanajer" action="{{route('manajer-insert')}}" method="post">
                              {{ csrf_field() }}
                              <label class="section-title">Tambahkan Program Kerja Direktur {{$divisi}}</label>
                              <p class="mg-b-20 mg-sm-b-40">Untuk tahun {{date('Y')}}</p>
                              <div class="form-layout">
                                <div class="row mg-b-25">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" name="nama" readonly value="{{$nama}}" >
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      <label class="form-control-label">Sub-Divisi: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" readonly name="divisi" value="{{$divisi}}">
                                    </div>
                                  </div><!-- col-3 -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      <label class="form-control-label">NIPP: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" readonly name="nipp" value="{{$nipp}}">
                                    </div>
                                  </div><!-- col-3 -->
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                                      <textarea required name="proker" class="form-control" type="text"></textarea>
                                    </div>
                                  </div><!-- col-3 -->
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="from" class="form-control-label">Tanggal Mulai <span class="tx-danger">*</span></label><br>
                                        <input required name="from" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd">
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="to" class="form-control-label">Tanggal Berakhir <span class="tx-danger">*</span></label><br>
                                        <input required name="to" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd">
                                    </div>
                                  </div><!-- col-6 -->
                                  <div class="col-lg-6" style="display:none;">
                                    <div class="form-group">
                                        <label for="to" class="form-control-label">Tanggal Berakhir <span class="tx-danger">*</span></label><br>
                                        <textarea required name="minggu" class="form-control" value="{{$now->weekOfYear}}">{{$now->weekOfYear}}</textarea>
                                    </div>
                                  </div><!-- col-6 -->
                                </div><!-- row -->
                              </div><!-- form-layout -->

                            </div> <!-- col-12 -->
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
                </div>
              </div><!-- modal-dialog -->
            </div><!-- modal -->
            </div><!-- section-wrapper -->
          </div>
        </div>


<!-- coding endss here  -->
@stop
