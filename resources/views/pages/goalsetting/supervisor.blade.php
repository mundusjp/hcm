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
              <h6 class="slim-pagetitle">Program Deputy Vice Director of {{Auth::user()->sub_subdivisi}}</h6>
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

              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            VicePresident                                                    -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <label class="section-title">Program Vice President of {{$divisi}}</label>
              <table class="table table-orange">
                <thead>
                <tr>
                  <td style="width:30px">No</td>
                  <td style="width:500px">Program Kerja</td>
                  <td style="width:150px">Mulai</td>
                  <td style="width:150px">Berakhir</td>
                </tr>
                </thead>
                <tbody>

                  <?php $i=0;?>
                  @foreach($manajer as $program)
                  <?php $i++;?>
                  <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$program->program_kerja}}</td>
                  <td>{{$program->mulai}}</td>
                  <td>{{$program->berakhir}}</td>
                </tr>
                @endforeach
              </table>
              <br>
              <hr>
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            Kelas DVP                                                        -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              @if(($kelas_jabatan > 8 && $kelas_jabatan != "TNO")||($jabatan == "Superadmin"))
              <button type="button"class="btn float-right" data-toggle="modal" data-target="#tambahdireksi">Tambahkan </button>
              <label class="section-title">Program Kerja Anda Sebagai {{$jabatan}} {{$divisi}}</label>
              @else
              <label class="section-title">Program Kerja Deputy Vice Director {{Auth::user()->sub_subdivisi}}</label>
              @endif
              <table class="table table-orange">
                <thead>
                <tr>
                  <td>No</td>
                  <td>Program Kerja</td>
                  @if(($kelas_jabatan > 8 && $kelas_jabatan != "TNO")||($jabatan == "Superadmin"))
                  <td>Mulai</td>
                  <td>Berakhir</td>
                  <td>Ubah</td>
                  <td>Hapus</td>
                  @endif
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($tugas as $program)
                  <?php $i++;?>
                  <tr>
                  <th style="width:30px" scope="row">{{$i}}</th>
                  <td style="width:500px">{{$program->program_kerja}}</td>
                  @if(($kelas_jabatan > 8 && $kelas_jabatan != "TNO")||($jabatan == "Superadmin"))
                  <td style="width:150px">{{$program->mulai}}</td>
                  <td style="width:150px">{{$program->berakhir}}</td>
                  <td>
                    <form id="edit" action="{{route('deputy-vice-president.edit',$program->id)}}" method="get">
                    @csrf
                    <button class="btn btn-outline-success" type="submit">Ubah</button>
                    </form>
                  </td>
                  <td>
                    <form id="hapus" action="{{route('deputy-vice-president.destroy',$program->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit">Hapus</button>
                  </td>
                  </form>
                  @endif
                </tr>
                @endforeach
              </table>
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <!--                                            Kelas TNO                                                        -->
              <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            </div><!-- section-wrapper -->
          </div>
        </div>


<!-- coding endss here  -->
@stop
