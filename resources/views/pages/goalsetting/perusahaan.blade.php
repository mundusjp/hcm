@extends('layouts.default')

@section('content')
<!-- coding starts here  -->
    <div class="slim-mainpanel">
          <div class="container">
            <div class="slim-pageheader">
              <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Goalsettings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visi Misi Perusahaan</li>
              </ol>
              <h6 class="slim-pagetitle">Form Layouts</h6>
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
              <div class="row">
                <div class="col-6">
                  <label class="section-title">Visi Perusahaan</label>
                  @if($divisi == "Utama" || $divisi == "Superadmin")
                  <button type="button"class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#tambahvisi">Tambahkan </button>
                  <p class="mg-b-20 mg-sm-b-40">Silahkan menambahkan visi dari perusahaan.</p>
                  @else
                  <p class="mg-b-20 mg-sm-b-40">Berikut adalah visi dari perusahaan.</p>
                  @endif

                  @if(!empty($visi_perusahaan))
                  <div class="table-responsive">

                    <table class="table table-hover mg-b-0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th style="width:350px;">Visi</th>
                          @if(($divisi == "Utama" && $kelas_jabatan <= 5) || $divisi == "Superadmin")
                          <th>Edit</th>
                          <th>Hapus</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; ?>
                        @foreach($visi_perusahaan as $row)
                        <?php $i++; ?>

                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{$row->visi}}</td>
                          @if(($divisi == "Utama" && $kelas_jabatan <= 5) || $divisi == "Superadmin")
                          <td>
                            <form action="{{route('perusahaan.edit', $row->id)}}" method="get">
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
                          @endif
                        </tr>

                         @endforeach
                      </tbody>
                    </table>

                  </div><!-- table-responsive -->
                  @else
                  <h6>Silahkan menambahkan Misi Perusahaan</h6>
                  @endif
                </div><!-- col-6 -->
                <div class="col-6">
                  <label class="section-title">Misi Perusahaan</label>
                  @if($divisi == "Utama" || $divisi == "Superadmin")
                  <button type="button"class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#tambahmisi">Tambahkan </button>
                  <p class="mg-b-20 mg-sm-b-40">Silahkan menambahkan misi dari perusahaan.</p>
                  @else
                  <p class="mg-b-20 mg-sm-b-40">Berikut adalah misi dari perusahaan.</p>
                  @endif
                  @if(!empty($misi_perusahaan))
                  <div class="table-responsive">
                    <table class="table table-hover mg-b-0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th style="width:350px;">Misi</th>
                          @if(($divisi == "Utama" && $kelas_jabatan <= 5) || $divisi == "Superadmin")
                          <th>Edit</th>
                          <th>Hapus</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; ?>

                        @foreach($misi_perusahaan as $row)
                        <?php $i++; ?>

                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{$row->misi}}</td>
                          @if(($divisi == "Utama" && $kelas_jabatan <= 5) || $divisi == "Superadmin")
                          <td>
                            <form action="{{route('perusahaan.edit', $row->id)}}" method="get">
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
                          @endif
                        </tr>

                         @endforeach
                      </tbody>
                    </table>

                  </div><!-- table-responsive -->
                  @else
                  <h6>Silahkan menambahkan Misi Perusahaan</h6>
                  @endif
                </div><!-- col-6 -->
              </div>
              <!--        -->
              <!-- MODALS -->
              <!--        -->
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
            </div><!-- section-wrapper -->
          </div>
        </div>


<!-- coding endss here  -->
@stop
