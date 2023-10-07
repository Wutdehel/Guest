@extends('adminlte::page')
@section('title', 'Data Pengunjung')
@section('content_header')
<h1 class="m-0 text-light"><strong>Input Data Pengunjung</strong></h1>
@stop
@section('content')
<form action="{{ route('pendaftaran.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body bg-gray">
                    <div class="form-group">
                        <label for="nama">Nama Anda</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Anda" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                        <span class="textdanger">Nama Anda Sudah Terdaftar</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="perusahaan">Perusahaan Anda</label>
                        <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" placeholder="Perusahaan" name="perusahaan" value="{{ old('perusahaan') }}">
                        @error('perusahaan')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="number" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" placeholder="Nomor Telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" oninput="maxLengthCheck(this)" max="9999999999999">
                        @error('nomor_telepon')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-warning text-light"><strong>Simpan</strong></button>
            </div>
        </div>
    </div>
    </div>
    @stop
    @push('js')
    <script>
function maxLengthCheck(object) {
    if (object.value.length > 13)
        object.value = object.value.slice(0, 13);

    // Show error message if needed
    if (object.value.length === 13) {
        document.getElementById("max-length-error").style.display = "none";
    } else {
        document.getElementById("max-length-error").style.display = "block";
    }
}
</script>

    @endpush