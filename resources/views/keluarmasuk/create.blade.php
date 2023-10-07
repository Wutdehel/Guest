@extends('adminlte::page')
@section('title', 'Form Masuk')
@section('content_header')
<h1 class="m-0 text-light">Masuk</h1>
@stop
@section('content')

<form action="{{route('modals')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body bg-dark">

                    <input type="hidden" name="id_pendaftaran" value="{{ $pendaftaran->id }}">
                    <div class="form-group">
                        <label for="lantai">Lantai</label>
                        <input type="number" class="form-control @error('lantai') is-invalid @enderror" id="lantai" placeholder="lantai" name="lantai" value="{{old('lantai')}}" required>
                        @error('lantai') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="rak">Rak</label>
                        <input type="number" class="form-control @error('rak') is-invalid @enderror" id="rak" placeholder="Rak" name="rak" value="{{old('rak')}}" max='100'>
                        @error('rak') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <select class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan">
                            <option value="goodsin" @if(old('keperluan')=='goodsin' ) selected @endif>Goods in</option>
                            <option value="goodsout" @if(old('keperluan')=='goodsout' ) selected @endif>Goods out</option>
                            <option value="installasi" @if(old('keperluan')=='installasi' ) selected @endif>Installasi</option>
                            <option value="maintenance" @if(old('keperluan')=='maintenance' ) selected @endif>Maintenance
                            </option>
                            <option value="visit" @if(old('keperluan')=='visit' ) selected @endif>
                                Visit</option>
                        </select>
                        @error('keperluan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="detail">Detail Keperluan</label>
                        <textarea class="form-control" name="detail" id="detail" placeholder="Harus diisi" required></textarea>
                        @error('detail') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="datetime-local" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" placeholder="Tanggal Masuk" name="tanggal_masuk" value="{{old('tanggal_masuk')}}">
                        @error('tanggal_masuk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group camera-container">
                        <div id="my_camera" class="camera"></div>
                        <br />
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                        <input type="hidden" name="foto_masuk" class="image-tag">
                    </div>

                    <div class="form-group">
                        <div id="results" class="image-result">Gambar yang Anda ambil akan muncul di sini...</div>
                    </div>


                </div>
                <div class="card-footer bg-dark">
                    <button type="submit" class="btn btn-warning text-light"><strong>Simpan</strong></button>
                    <a href="{{route('keluarmasuk.index')}}" class="btn btn-danger text-light">
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

    @push ('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
    @endpush

    @push('css')
    <style>
        #results {
            padding: 20px;
            border: 1px solid;
            background: #ccc;
        }
    </style>
    @endpush