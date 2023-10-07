@extends('adminlte::page')
@section('title', 'Data Pengguna')
@section('content_header')
<h1 class="m-0 text-light">Data Pengguna</h1>
@stop
@section('content')

<link rel="stylesheet" href="path/to/adminlte/css/adminlte.min.css">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body bg-gray">
            <a href="{{route('users.create')}}" class="btn btn-warning text-dark mb-2">
                Tambah
            </a>
                <table class="table  bg-gray-dark" id="example2">
                    <thead>
                        <tr>
                            <th class="bg-warning">No.</th>
                            <th class="bg-warning">Email</th>
                            <th class="bg-warning">Level</th>
                            <th class="bg-warning">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->level}}</td>
                            <td>
                                <a href="{{route('users.edit', $user)}}" class="btn btn-warning btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('users.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush