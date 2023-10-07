@extends('adminlte::page')

@section('title', 'Pencarian Tamu')

@section('content_header')
<h1 class="m-0 text-light"><strong>Pencarian Tamu</strong></h1>
@stop

@section('content')
<div class=" row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-gray">
                <h3 class="card-title">Hasil Pencarian</h3>
            </div>
            <div class="card-body bg-dark">
                <!-- Your search form goes here -->
                <form class="form-inline mb-3" action="{{ route('search') }}" method="GET">
                    <input class="form-control mr-sm-2" type="search" name="q" placeholder="Cari Nama / No Telepon" aria-label="Search" value="{{ request()->get('q') }}">
                    <button class=" btn btn-outline-warning my-2 my-sm-0 mr-2" type="submit">Cari</button>
                    </br>
                    <button type="button" class="btn btn-outline-danger my-2 my-sm-0" onclick="location.href='{{ route('keluar.index') }}'">Keluar</button>
                </form>
                <div class="d-flex flex-row flex-wrap">
                    @isset($results)     
                    @forelse($results as $index => $result)
                    <div class="col-md-4">
                        <div class="card mb-3 bg-gray">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $result->nama }}</strong></h5>
                                <p class="card-text">Perusahaan: {{ $result->perusahaan }}</p>
                                <p class="card-text">Nomor Telepon: {{ $result->nomor_telepon }}</p>
                                <div class="text-center">
                                    <button type="button" class="btn btn-warning btn-block text-light" onclick="location.href='{{ route('keluarmasuk.create', ['id_pendaftaran' => $result->id]) }}'"><strong>Masuk</strong></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12 text-center">
                        <div class="alert ">
                            Hasil tidak dapat ditemukan
                        </div>
                    </div>                    
                    @endforelse
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@stop