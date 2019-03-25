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
              <h6 class="slim-pagetitle">Program Supervisor</h6>
            </div><!-- slim-pageheader -->
            <div class="section-wrapper">
              <label class="section-title">Program Direktur {{$divisi}}</label>
              <br>
              <hr>
              <button type="button"class="btn float-right" data-toggle="modal" data-target="#tambahdireksi">Tambahkan </button>
              <label class="section-title">Program Anda Sebagai {{$jabatan}} {{$divisi}}</label>
            </div><!-- section-wrapper -->
          </div>
        </div>


<!-- coding endss here  -->
@stop
