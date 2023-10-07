<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeluarMasuk;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class KeluarController extends Controller
{
    public function index()
    {
        //Menampilkan Form Tambah 
        $data = Keluarmasuk::where('keterangan', 'belum_keluar')->get();
        return view('keluarmasuk.exit', compact('data'));
    }

}
