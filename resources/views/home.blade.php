@extends('adminlte::page')

@section('title', 'Guest')

@section('content_header')
    <h1 class="m-0 text-light"><b>Beranda</b></h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row" id="example2">
            @foreach($pendaftaran->slice(0,1) as $key => $data)
                <div class="col-lg-3 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                    <div class="inner">
                            @if($data->count() > 0)
                                <h3><a href="#" style="color: white;">{{$data->count()}}</a></h3>
                                <p>Total</p>
                            @else
                                <h3>Maaf</h3>
                                <p>Belum ada tamu</p>
                            @endif
                        </div>
                        <div class="icon">
                        <i class="fas fa-users"></i> <!-- Ikon Total Tamu -->
                    </div>
                    <a href="#" class="small-box-footer">Total keseluruhan tamu </a>
                    </div>
                </div>
                @endforeach          

                <div class="col-lg-3 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $averageWeekly }}<sup style="font-size: 20px"> /week</sup></h3>
                            <p>Rata - Rata</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-line"></i> <!-- Ikon Rata-Rata Tamu -->
                    </div>
                    <a href="#" class="small-box-footer">Rata-rata tamu mingguan</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                        @if($jumlahTamuBelumKeluar > 0)
                            <h3>{{ $jumlahTamuBelumKeluar }}</h3>
                            <p>Jumlah Tamu</p>
                        @else
                            <h3>Maaf</h3>
                            <p>Belum ada tamu</p>
                        @endif
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <a href="#" class="small-box-footer">Jumlah tamu hari ini</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3 style="font-size: 15px">PT USAHA ADI SANGGORO</h3>
                        <span id="datetime">Loading...</span>
                        <p>Bogor Tengah</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clock"></i> <!-- Icon Unique Visitors -->
                    </div>
                    <a href="#" class="small-box-footer">Jl. Dr.Semeru</a>
                </div>
            </div>  
            </div>
        </div>
    </section>
    <!-- /.row -->

    <div class="row">
    <div class="col-md-6">
        <div class="card card-warning" style="height: 350px;">
            <div class="card-header">
                <h3 class="card-title" style="font-size: 24px;">Masuk</h3>
            </div>
            <div class="card-body text-center card-gray bg-gradient-gray">
                <i class="fas fa-address-card fa-5x mb-3"></i>
                <p style="font-size: 25px;">Jika sudah pernah masuk, silahkan isi disini!</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('keluarmasuk.index') }}" class="btn btn-orange bg-gradient-orange">Masuk</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-warning" style="height: 350px;">
            <div class="card-header">
                <h3 class="card-title" style="font-size: 24px;">Daftar</h3>
            </div>
            <div class="card-body text-center card-gray bg-gradient-gray">
                <i class="fas fa-user-plus fa-5x mb-3" aria-hidden="true"></i>
                <p style="font-size: 25px;">Jika belum pernah masuk, silahkan daftar disini!</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-orange bg-gradient-orange">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
<script>
    function updateDateTime() {
        const now = new Date();
        const options = {
            timeZone: 'Asia/Jakarta',
            year: 'numeric', month: 'short', day: 'numeric',
            hour: '2-digit', minute: '2-digit', second: '2-digit'
        };
        const formattedDateTime = now.toLocaleString('en-US', options);
        document.getElementById('datetime').textContent = formattedDateTime;
    }

    // Update the date and time immediately
    updateDateTime();

    // Update the date and time every second
    setInterval(updateDateTime, 1000);
</script>
@stop

@push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
    </script>
@endpush