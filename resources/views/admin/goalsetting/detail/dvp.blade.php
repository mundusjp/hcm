@extends('layouts.admin')

@section('content')
<!-- coding starts here  -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Program Kerja Deputy Vice President</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Deputy Vice President</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-12">
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
                    <strong class="card-title">Program Kerja {{$dvp->nama}} - {{$dvp->jabatan}} Tahun {{$now->year}}</strong>
                    <button class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#tambahdvp">Tambah Program Kerja</button>
                </div>
                <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Program Kerja</th>
                            <th>Deadline</th>
                            <th>Progres</th>
                            <th>Status</th>
                            <th>Ubah</th>
                            <th>Hapus</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; ?>
                        @foreach($proker as $program)
                        <?php $i++; ?>
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td style="width:500px">{{$program->program_kerja}}</td>
                          <td>{{$program->due_date}}</td>
                          <td >
                            <div class="progress mg-b-5">
                              <div class="progress-bar progress-bar-lg bg-warning wd-{{$program->progres}}p" role="progressbar" aria-valuenow="{{$program->progres}}" aria-valuemin="0" aria-valuemax="100">{{$program->progres}}%</div>
                            </div>
                          </td>
                          @if($program->status_task == "Belum Direspon" || $program->status_task == "Belum Disampaikan")
                          <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-dark">{{$program->status_task}}</span></td>
                          @elseif($program->status_task == "Sedang Diproses")
                          <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-info">{{$program->status_task}}</span></td>
                          @elseif($program->status_task == "Terlambat" || $program->status_task == "Diperingatkan" || $program->status_task == "Ditunda" || $program->status_task == "Konfirmasi Dibatalkan")
                          <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-warning">{{$program->status_task}}</span></td>
                          @elseif($program->status_task == "Dibatalkan")
                          <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-danger">{{$program->status_task}}</span></td>
                          @else
                          <td style="width:25px;text-align:center;"><span class="badge badge-pill badge-success">{{$program->status_task}}</span></td>
                          @endif
                        <td>
                          <form id="edit" action="{{route('superadmin.dvp.edit',$program->id)}}" method="get">
                          @csrf
                          <button class="btn btn-outline-success" type="submit">Ubah</button>
                          </form>
                        </td>
                        <td>
                          <form id="hapus" action="{{route('deputy-vice-president.destroy',$program->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-outline-danger" type="submit" onclick="return confirm_delete()">Hapus</button>
                        </td>
                        </form>
                      </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
      </div>
      <script type="text/javascript">
        function confirm_delete() {
          return confirm('Apakah Anda Yakin ingin Menghapus?');
        }
      </script>
      <div class="modal fade" id="tambahdvp" tabindex="-1" role="dialog" aria-labelledby="ConfigUpdateLabel" aria-hidden="true">
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
                      <form action="{{route('deputy-vice-president.store')}}" method="post">
                      {{ csrf_field() }}
                      <label class="section-title">Tambahkan Program Kerja Direktur {{$divisi}}</label>
                      <p class="mg-b-20 mg-sm-b-40">Untuk tahun {{date('Y')}}</p>
                      <div class="form-layout">
                        <div class="row mg-b-25">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="nama" readonly value="{{$dvp->nama}}" >
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label class="form-control-label">Sub-Subdivisi: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" readonly name="divisi" value="{{$dvp->sub_subdivisi}}">
                            </div>
                          </div><!-- col-3 -->
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label class="form-control-label">NIPP: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" readonly name="nipp" value="{{$dvp->nipp}}">
                            </div>
                          </div><!-- col-3 -->
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label">Program VP Terkait <span class="tx-danger">*</span></label>
                              <select name="program_vp" class="form-control select2-show-search" data-placeholder="Choose one">
                                @foreach($program_vp as $program)
                                <option value="{{$program->id}}">{{$program->program_kerja}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div><!-- col-12 -->
                          <div class="col-lg-10">
                            <div class="form-group">
                              <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                              <textarea required name="proker" class="form-control" type="text"></textarea>
                            </div>
                          </div><!-- col-9 -->
                          <div class="col-lg-2">
                            <div class="form-group">
                              <label class="form-control-label">Bobot <span class="tx-danger">*</span></label>
                              <input required name="bobot" class="form-control" type="number" min="1" max="100" value="100">
                            </div>
                          </div><!-- col-9 -->
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label for="from" class="form-control-label">Tanggal Mulai <span class="tx-danger">*</span></label><br>
                                <input required name="from" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd" value="{{$now->format('Y-m-d')}}">
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label for="to" class="form-control-label">Tanggal Berakhir <span class="tx-danger">*</span></label><br>
                                <input required name="to" class="form-control" type="date" data-date="" data-date-format="yyyy-mm-dd" value="{{Carbon\Carbon::tomorrow()->format('Y-m-d')}}">
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
  <!-- /#add-category -->
  </div>
  <!-- .animated -->
</div>
<!-- /.content -->
<!-- coding endss here  -->
@stop
