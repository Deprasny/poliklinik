@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('store.dokter') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('poliklinik_id') ? ' has-error' : '' }}">
                            <label for="poliklinik_id" class="col-md-4 control-label">Nama Poliklinik</label>
                              <div class="col-md-6">
                            <select id="poliklinik_id" type="poliklinik_id" class="form-control" name="poliklinik_id">
                                    <option value="">Pilih Klinik</option>
                                    @foreach ($poliklinik as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('poliklinik_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poliklinik_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('spesialis') ? ' has-error' : '' }}">
                            <label for="spesialis" class="col-md-4 control-label">Spesialis</label>

                            <div class="col-md-6">
                                <input id="spesialis" type="text" class="form-control" name="spesialis" value="{{ old('spesialis') }}" required autofocus>

                                @if ($errors->has('spesialis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('spesialis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
                            <label for="telepon" class="col-md-4 control-label">Telepon</label>

                            <div class="col-md-6">
                                <input id="telepon" type="text" class="form-control" name="telepon" value="{{ old('telepon') }}" required autofocus>

                                @if ($errors->has('telepon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telepon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tarif') ? ' has-error' : '' }}">
                            <label for="tarif" class="col-md-4 control-label">Tarif</label>

                            <div class="col-md-6">
                                <input id="tarif" type="text" class="form-control" name="tarif" value="{{ old('tarif') }}" required autofocus>

                                @if ($errors->has('tarif'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tarif') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
