@extends('layout/master')
@section('konten')
    @foreach ($penduduk as $item)
        <form action="{{ url('/penduduk/update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4>Edit Penduduk</h4>
                <div class="form-group">
                    <input name="nik" type="hidden" class="form-control rounded-0" id="exampleInputRounded0"
                        value="{{ $item->nik }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputRounded0">No Kartu Keluarga</label>
                    <input name="kk" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                        value="{{ $item->no_kk }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputRounded0">Nama</label>
                    <input name="nama" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                        value="{{ $item->nama }}">
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
                        value="{{ $item->alamat }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputRounded0">No HP</label>
                    <input name="hp" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                        value="{{ $item->no_hp }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputRounded0">Agama</label>
                    <input name="agama" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                        value="{{ $item->agama }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputRounded0">Pekerjaan</label>
                    <input name="pekerjaan" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                        value="{{ $item->pekerjaan }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary col-12" type="submit">Submit</button>
                </div>
            </div>
        </form>
    @endforeach
@endsection
