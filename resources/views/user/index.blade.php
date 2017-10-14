@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                  <table class="table">
                    <tr>
                      <td>no</td>
                      <td>Username</td>
                      <td>Nama</td>
                      <td>Alamat</td>
                      <td>Akses</td>
                      <td>Aksi</td>
                    </tr>
                    @if($user->count() > 0)
                    @foreach($user as $data)
                    <tr>
                      <td>{{ (($user->currentPage() - 1 ) * $user->perPage() ) + $loop->iteration }}</td>
                      <td>{{ $data->username }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->alamat }}</td>
                      <td>{{ $data->akses }}</td>
                      <td>

                        <a href="{{ route('edit.user', $data->id) }}"> Edit</a>
                        <a href="{{ route('delete.user', $data->id) }}"> Hapus</a>

                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                    <td align="center" colspan="5">Buku tidak ada</td>
                    </tr>
                    @endif
                  </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
