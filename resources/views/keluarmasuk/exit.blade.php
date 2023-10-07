@extends('adminlte::page')

@section('title', 'Keluarmasuk Exit')

@section('content_header')
<h1 class="m-0 text-light">Daftar Pengunjung Saat Ini</h1>
@stop

@section('content')
<div class="row">
    @forelse($data as $item)
    <div class="col-md-4">
        <div class="card bg-gray">
            <div class="card-body">
                <h5 class="card-title">{{ $item->pendaftaran->nama }}</h5>
                <p class="card-text">Perusahaan: {{ $item->pendaftaran->perusahaan }}</p>
                <img src="{{ asset('storage/' . $item->foto_masuk) }}" alt="Foto Masuk" class="img-fluid">
                <button class="btn btn-warning btn-block mt-3" onclick="location.href='{{ route('keluarmasuk.edit', ['id' => $item->id]) }}'">Keluar</button>
            </div>
        </div>
    </div>
    @empty
    <div class="col-md-12 ">
        <div class="alert text-center">
            <p class="text-white display-5"> Data tidak dapat ditemukan.</p>
        </div>
    </div>
    @endforelse
</div>
@stop