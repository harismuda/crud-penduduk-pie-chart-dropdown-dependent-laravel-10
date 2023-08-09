@extends('layout/master')
@section('konten')
    <form action="{{ url('penduduk/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h4>Tambah Penduduk</h4>
            <div class="form-group">
                <label for="exampleInputRounded0">NIK</label>
                <input name="nik" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                    placeholder="Masukkan NIK">
            </div>
            <div class="form-group">
                <label for="exampleInputRounded0">No Kartu Keluarga</label>
                <input name="kk" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                    placeholder="Masukkan No KK">
            </div>
            <div class="form-group">
                <label for="exampleInputRounded0">Nama</label>
                <input name="nama" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                    placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label for="exampleInputRounded0">Jenis Kelamin</label>
                <select name="jk" class="form-control rounded-0">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputRounded0">Alamat Lengkap</label>
                <input name="alamat" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                    placeholder="Masukkan Alamat">
            </div>
            <div class="form-group">
                <label for="exampleInputRounded0">No HP</label>
                <input name="hp" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                    placeholder="Masukkan No HP">
            </div>
            <div class="form-group">
                <label for="exampleInputRounded0">Agama</label>
                <input name="agama" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                    placeholder="Masukkan Agama">
            </div>
            <div class="form-group">
                <label for="exampleInputRounded0">Pekerjaan</label>
                <input name="pekerjaan" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                    placeholder="Masukkan Pekerjaan">
            </div>
            <div class="form-group">
                <button class="btn btn-primary col-12" type="submit">Submit</button>
            </div>
        </div>
    </form>
@endsection
