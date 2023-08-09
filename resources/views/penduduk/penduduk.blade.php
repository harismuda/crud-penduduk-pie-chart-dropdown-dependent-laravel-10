@extends('layout/master')
@section('konten')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Table Penduduk</h3>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>No KK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat Lengkap</th>
                        <th>No HP</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penduduk as $item)
                        <tr>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->no_kk }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>
                                <a href="/penduduk/edit/{{ $item->nik }}">
                                    <button type="button" class="btn btn-sm btn-info" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <a href="/penduduk/hapus/{{ $item->nik }}">
                                    <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
