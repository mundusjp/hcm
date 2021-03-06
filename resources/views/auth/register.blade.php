@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nipp" class="col-md-4 col-form-label text-md-right">{{ __('NIPP') }}</label>

                            <div class="col-md-6">
                                <input id="nipp" type="text" class="form-control{{ $errors->has('nipp') ? ' is-invalid' : '' }}" name="nipp" value="{{ old('nipp') }}" required autofocus>

                                @if ($errors->has('nipp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nipp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>

                            <div class="col-md-6">
                                <input id="jabatan" type="text" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" value="{{ old('jabatan') }}" required autofocus>
                                @if ($errors->has('jabatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="divisi" class="col-md-4 col-form-label text-md-right">{{ __('Divisi') }}</label>

                            <div class="col-md-6">
                                <select name="divisi" class="form-control">
                                  <option>Utama</option>
                                  <option>Operasi</option>
                                  <option>Keuangan & SDM</option>
                                  <option>Komersial & Pengembangan Bisnis</option>
                                  <option>Kepatuhan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelas_jabatan" class="col-md-4 col-form-label text-md-right">{{ __('Kelas Jabatan') }}</label>

                            <div class="col-md-6">
                                <input id="kelas_jabatan" type="text" class="form-control" name="kelas_jabatan" required autofocus>

                                @if ($errors->has('kelas_jabatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kelas_jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
