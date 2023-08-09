@extends('layout/master')
@section('konten')
    <form action="">
        <div class="card-body">
            <h4>Data Wilayah</h4>
            <div class="form-group">
                <label>Provinsi</label>
                <select class="custom-select rounded-0" id="provinsi">
                    <option value="">Pilih Provinsi...</option>
                    @foreach ($name as $data)
                        <option value="{{ $data->code }}">
                            {{ $data->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Kabupaten</label>
                <select class="custom-select rounded-0" id="kabupaten">
                    <option value="">Pilih Kabupaten...</option>
                </select>
            </div>
            <div class="form-group">
                <label>Kecamatan</label>
                <select class="custom-select rounded-0" id="kecamatan">
                    <option value="">Pilih Kecamatan...</option>
                </select>
            </div>
            <div class="form-group">
                <label>Kelurahan/Desa</label>
                <select class="custom-select rounded-0" id="desa">
                    <option value="">Pilih Kelurahan/Desa...</option>
                </select>
            </div>
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
