<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- vendor css -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Slim CSS -->
    <link href="{{ asset('css/slim.css') }}" rel="stylesheet" type="text/css" >
  </head>
  <body>
    <div class="slim-mainpanel">
      <div class="container">
        <div class="card card-invoice">
          <div class="card-body">
            <div class="invoice-header">
              <h1 class="invoice-title">Logbook Harian</h1>
              <div class="billed-from">
                <h6>{{$company->nama}}</h6>
                <p>{{$company->alamat}}<br>
                Tel No: {{$company->no_telp}}<br>
                Email: {{$company->email}}</p>
              </div><!-- billed-from -->
            </div><!-- invoice-header -->

            <div class="row mg-t-20">
              <div class="col-md">
                <label class="section-label-sm tx-gray-500">Harian Milik:</label>
                <div class="billed-to">
                  <h6 class="tx-gray-800">{{Auth::user()->nama}}</h6>
                  <p>{{Auth::user()->jabatan}} <br>
                  Email: {{Auth::user()->email}}</p>
                </div>
              </div><!-- col -->
              <div class="col-md">
                <label class="section-label-sm tx-gray-500">Berikut adalah detail logbook harian:</label>
                <p class="invoice-info-row">
                  <span>Tanggal</span>
                  <span>{{Carbon\Carbon::now()->format('Y-m-d')}}</span>
                </p>
              </div><!-- col -->
            </div><!-- row -->
            <div class="table-responsive mg-t-40">
              <table class="table table-invoice">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th class="wd-250p">Program Kerja Terkait</th>
                    <th>Target</th>
                    <th class="wd-250p">Log Hari Ini</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($data as $log)
                  <?php $i++;?>
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$log->program_kerja_terkait}}</td>
                    <td>{{$log->target}}</td>
                    <td>{{$log->logbook}}</td>
                    <td>{{$log->status}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table-responsive -->
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- container -->
    </div><!-- slim-mainpanel -->
  </body>
</html>
