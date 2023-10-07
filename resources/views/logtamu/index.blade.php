@extends('adminlte::page')
@section('title', 'LogTamu')
@section('content_header')
<h1 class="m-0 text-light">Log Keluar Masuk Tamu</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
                <link rel="stylesheet" href="/css/app.css">
                <div class="card-body bg-gray">
                    <form method="get" action="{{ route('searchta') }}"class="form-inline">
                        <div class="form-group mb-2">
                            <label for="start" class="card-body">Tanggal Masuk:</label>
                            <input type="date" class="form-control" id="start" name="start" placeholder="Tanggal Mulai" value="{{ old('start') }}">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="end" class="card-body">Tanggal Keluar:</label>
                            <input type="date" class="form-control" id="end" name="end" placeholder="Tanggal Selesai" value="{{ old('end') }}">
                        </div>
                        &nbsp;
                        &nbsp;
                        <button type="submit" class="btn btn-warning mb-2"><i class="fa fa-filter "></i> &nbsp;Filter</button>
                    </form>

            <div class="card-body bg-gray">
                <div class="table-responsive ">
                    <table id="laporan" class="table table-stripped table-hover">
                            <thead class="thead-inverse">
                                <tr>
                                <th class="bg-warning">No</th>
                                <th class="bg-warning">Nama Tamu</th>
                                <th class="bg-warning">Perusahaan</th>
                                <th class="bg-warning">No Telepon</th>
                                <th class="bg-warning">Tanggal Masuk</th>
                                <th class="bg-warning">Tanggal Keluar</th>
                                <th class="bg-warning">Foto Masuk</th>
                                <th class="bg-warning">Rak</th>
                                <th class="bg-warning">Lantai</th>
                                <th class="bg-warning">Keperluan</th>
                                <th class="bg-warning">Detail</th>
                                <th class="bg-warning">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($keluarmasuk as $key => $lt)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td id={{$key+1}}>{{ $lt->pendaftaran->nama}}</td>
                                <td id={{$key+1}}>{{ $lt->pendaftaran->perusahaan}}</td>
                                <td id={{$key+1}}>{{ $lt->pendaftaran->nomor_telepon}}</td>
                                <td>{{ $lt->tanggal_masuk }}</td>
                                <td>{{ $lt->tanggal_keluar }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#fotoModal-{{ $key }}">
                                        Lihat Foto
                                    </button>
                                </td>         
                                <td>{{ $lt->rak }}</td>
                                <td>{{ $lt->lantai }}</td>
                                <td>{{ $lt->keperluan }}</td>
                                <td>{{ $lt->detail }}</td>
                                <td>
                                @switch($lt->keterangan)
                                    @case ('done')
                                        Sudah Keluar
                                        @break
                                    @default
                                        Belum Keluar
                                @endswitch
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    @foreach($keluarmasuk as $key => $lt)
    <div class="modal fade" id="fotoModal-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel-{{ $key }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fotoModalLabel-{{ $key }}">Foto Masuk Tamu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/' . $lt->foto_masuk) }}" alt="Foto Masuk">
                </div>
                <div class="modal-footer">
                    <a href="{{ asset('storage/' . $lt->foto_masuk) }}" download class="btn btn-warning">Unduh Foto</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @endpush

    @stop
    @push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

    </script>
@endpush
