@extends('layouts.ubah')

@section('content')
<!-- Start Coding here -->
<style>
.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #f27510;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #f27510;
  cursor: pointer;
}
.slidecontainer {
  width: 100%; /* Width of the outside container */
}
</style>
<div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">Ubah Target Program Kerja Direksi {{Auth::user()->divisi}}</h6>
        </div><!-- slim-pageheader -->
        <div class="section-wrapper">
          <form action="{{route('direksi.update-target',$program->id)}}" method="post">
          @method('PATCH')
          {{ csrf_field() }}
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Program Kerja <span class="tx-danger">*</span></label>
                  <textarea class="form-control" type="text" name="proker" readonly>{{$program->program_kerja}}</textarea>
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-12">
                  <div class="slidecontainer">
                    <input name="target" type="range" min="0" max="100" value="{{$program->target_bulanan}}" class="slider" id="myRange">
                  </div><br>
                  <p>Target: <span id="demo"></span>%</p>
                <script>
                var slider = document.getElementById("myRange");
                var output = document.getElementById("demo");
                output.innerHTML = slider.value;

                slider.oninput = function() {
                  output.innerHTML = this.value;
                }
                </script>
              </div><!-- col-6 -->
            </div><!-- row -->
            <div class="form-layout-footer">
              <div class="justifier" style="text-align:right;">
              <button type="submit" class="btn btn-outline-warning">Ubah Target</button><br><br>
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
