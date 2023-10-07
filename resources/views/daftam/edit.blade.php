@extends('adminlte::page')
@section('title', 'Edit Data Tamu')
@section('content_header')
<h1 class="m-0 text-dark">Edit Data Tamu</h1>
@stop
@section('content')
<form action="{{route('daftam.update', $pendaftaran)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama">Nama Pendaftar</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            placeholder="Masukan Nama Pendaftar" name="nama" value="{{$pendaftaran->nama ?? old('nama')}}">
                        @error('nama') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan"
                            placeholder="Masukan Nama Perusahaan Pendaftar" name="perusahaan" value="{{$pendaftaran->perusahaan ?? old('perusahaan')}}">
                        @error('perusahaan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon"
                            placeholder="Masukan Nomor Telepon Pendaftar" name="nomor_telepon" value="{{$pendaftaran->nomor_telepon ?? old('nomor_telepon')}}">
                        @error('nomor_telepon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Simpan</button>
                    <a href="{{route('daftam.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
    @push('js')
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    </script>
    @endpush