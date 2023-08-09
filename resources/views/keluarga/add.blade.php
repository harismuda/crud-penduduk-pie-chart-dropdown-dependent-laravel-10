@extends('layout/master')
@section('konten')
    <form action="{{ url('/kk/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h4>Tambah Kartu Keluarga</h4>
            <label for="exampleInputRounded0">No Kartu Keluarga</label>
            <div class="form-group">
                <input name="kk" type="text" class="form-control rounded-0" id="exampleInputRounded0"
                    placeholder="Masukkan No KK">
            </div>
            <table>
                <tr>
                    <th>
                        <label>Provinsi</label>
                    </th>
                    <th>
                        <label>Kabupaten</label>
                    </th>
                    <th>
                        <label>Kecamatan</label>
                    </th>
                    <th>
                        <label>Kelurahan/Desa</label>
                    </th>
                    <th>
                        <label for="image">Foto</label>
                    </th>
                </tr>
                <tr>
                    <td>
                        <select class="custom-select rounded-0" id="provinsi" name="provinsi">
                            <option value="">Pilih Provinsi...</option>
                            @foreach ($name as $data)
                                <option value="{{ $data->code }}">
                                    {{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="custom-select rounded-0" id="kabupaten" name="kabupaten">
                            <option value="">Pilih Kabupaten...</option>
                        </select>
                    </td>
                    <td>
                        <select class="custom-select rounded-0" id="kecamatan" name="kecamatan">
                            <option value="">Pilih Kecamatan...</option>
                        </select>
                    </td>
                    <td>
                        <select class="custom-select rounded-0" id="desa" name="kelurahan">
                            <option value="">Pilih Kelurahan/Desa...</option>
                        </select>
                    </td>
                    <td>
                        <input type="file" name="foto" id="image" class="form-control rounded-0">
                    </td>
                </tr>
            </table>
            <div class="form-group">
                <button class="btn btn-primary col-12 mt-2" type="submit">Submit</button>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        /*------------------------------------------
                                    --------------------------------------------
                                    Country Dropdown Change Event
                                    --------------------------------------------
                                    --------------------------------------------*/
        $(document).ready(function() {
            $('#provinsi').on('change', function() {
                var idProvinsi = $(this).val();
                if (idProvinsi) {
                    $.ajax({
                        url: "{{ route('getKabupaten', ':idProvinsi') }}".replace(
                            ':idProvinsi',
                            idProvinsi),
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#kabupaten').empty();
                            $('#kabupaten').append(
                                '<option value="">Pilih Kabupaten...</option>');
                            $.each(data, function(key, value) {
                                $('#kabupaten').append('<option value="' +
                                    value.code + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kabupaten').empty();
                    $('#kabupaten').append('<option value="">Select a city</option>');
                }
            });
            $('#kabupaten').on('change', function() {
                var idkabupaten = $(this).val();
                if (idkabupaten) {
                    $.ajax({
                        url: "{{ route('getKecamatan', ':idkabupaten') }}".replace(
                            ':idkabupaten',
                            idkabupaten),
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#kecamatan').empty();
                            $('#kecamatan').append(
                                '<option value="">Pilih kecamatan...</option>');
                            $.each(data, function(key, value) {
                                $('#kecamatan').append('<option value="' +
                                    value.code + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kecamatan').empty();
                    $('#kecamatan').append('<option value="">Select a city</option>');
                }
            });
            $('#kecamatan').on('change', function() {
                var idKecamatan = $(this).val();
                if (idKecamatan) {
                    $.ajax({
                        url: "{{ route('getDesa', ':idKecamatan') }}".replace(
                            ':idKecamatan',
                            idKecamatan),
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#desa').empty();
                            $('#desa').append(
                                '<option value="">Pilih desa...</option>');
                            $.each(data, function(key, value) {
                                $('#desa').append('<option value="' +
                                    value.code + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#desa').empty();
                    $('#desa').append('<option value="">Select a city</option>');
                }
            });
        });
    </script>
@endsection
