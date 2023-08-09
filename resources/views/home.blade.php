@extends('layout/master')
@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                {!! $pendudukKelaminChart->container() !!}
            </div>
        </div>
    </div>
</div>

<script src="{{ $pendudukKelaminChart->cdn() }}"></script>

{{ $pendudukKelaminChart->script() }}
@endsection