<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PendaftaranController extends Controller
{
    public function index(){
    //Menampilkan Form Tambah 
    return view(
    'pendaftaran.index', [
        'pendaftaran' => Pendaftaran::all(),
    ]);
    }

    public function store(Request $request){
        
        //Menyimpan Data 
        $request->validate([
        'nama' =>'required|unique:pendaftaran,nama',
        'perusahaan'=> 'required',
        'nomor_telepon'=> 'required|unique:pendaftaran,nomor_telepon',
        ]);
        $array = $request->only([
        'nama', 'perusahaan', 'nomor_telepon'
        ]);
        Pendaftaran::create($array);
        return redirect()->route('keluarmasuk.index')->with('success_message', 'Berhasil Mendaftar');
    }

    
}
