@extends('adminlte::page')
@section('title', 'Data Tamu')
@section('content_header')
<h1 class="m-0 text-dark">Data Tamu</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body bg-gray">
                <table class="table table-hover bg-gray-dark table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th class="bg-warning">No.</th>
                            <th class="bg-warning">Nama Tamu</th>
                            <th class="bg-warning">Perusahaan</th>
                            <th class="bg-warning">Nomor Telepon</th>
                            <th class="bg-warning">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftaran as $key => $k)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$k->nama}}</td>
                            <td id={{$key+1}}>{{$k->perusahaan}}</td>
                            <td id={{$key+1}}>{{$k->nomor_telepon}}</td>
                            <td>
                                <a href="{{route('daftam.edit', $k)}}" class="btn btn-warning btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('daftam.destroy', $k)}}"
                                    onclick="notificationBeforeDelete(event, this, <?php echo $key+1; ?>)"
                                    class="btn btn-danger btn-xs">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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

function notificationBeforeDelete(event, el, dt) {
    event.preventDefault();
    if (confirm('Apakah anda yakin akan menghapus tamu? \"' + document.getElementById(dt).innerHTML +
        '\" ?')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>
@endpush