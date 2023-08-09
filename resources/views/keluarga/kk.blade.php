@extends('layout/master')
@section('konten')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Table Kartu Keluarga</h3> <code><i>Warning : Crate Penduduk Dulu Supaya KK Muncul ! </i></code>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No Kartu Keluarga</th>
                        <th>NIK</th>
                        <th>Kelurahan/Desa</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kk as $item)
                        <tr>
                            <td>{{ $item->no_kk }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$item->foto) }}" style="width: 75px">
                            </td>
                            <td>
                                <a href="/edit/{{ $item->no_kk }}">
                                    <button type="button" class="btn btn-sm btn-info" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <a href="/kk/hapus/{{ $item->no_kk }}">
                                    <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </a>
                                <a href="/detail/{{ $item->no_kk }}">
                                    <button type="button" class="btn btn-sm btn-info" title="Detail">
                                        <i class="fas fa-edit"></i>
                                        Detail
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
