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
              <label class="section-title">Program Vice President of {{$divisi}}</label>
              <br>
              <hr>
              <button type="button"class="btn float-right" data-toggle="modal" data-target="#tambahdireksi">Tambahkan </button>
              <label class="section-title">Program Kerja Anda Sebagai {{$jabatan}} {{$divisi}}</label>
            </div><!-- section-wrapper -->
          </div>
        </div>


<!-- coding endss here  -->
@stop
