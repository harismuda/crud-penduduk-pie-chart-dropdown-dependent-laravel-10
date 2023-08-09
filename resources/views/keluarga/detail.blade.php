@extends('layout/master')
@section('konten')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Detail Kartu Keluarga</h3>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No Kartu Keluarga</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Kelurahan/Desa</th>
                        <th>Foto Kartu Keluarga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kk as $item)
                        <tr>
                            <td>{{ $item->no_kk }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{ asset('storage/'.$item->foto) }}" style="width: 75px"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ url('kk') }}">
            <button class="btn btn-dark col-12">Kembali</button>
        </a>
        <!-- /.card-body -->
    </div>
@endsection
