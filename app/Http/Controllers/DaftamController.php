<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DaftamController extends Controller
{
    public function index(){
        //Menampilkan Form Tambah 
        return view(
        'daftam.index', [
            'pendaftaran' => Pendaftaran::all(),
        ]);
        
        }
        public function edit($id)
        {
        //Menampilkan Form Edit
        $pendaftaran = Pendaftaran::find($id);
        if (!$pendaftaran) return redirect()->route('daftam.index')
        ->with('error_message', 'Tamu dengan id = '.$id.'
        tidak ditemukan');
        return view('daftam.edit', [
        'pendaftaran' => $pendaftaran,
        ]);
        }

        public function update(Request $request, $id)
        {
        //Mengedit Data Standar Kompetensi
        $request->validate([
            'nama' =>'required',
            'perusahaan'=> 'required',
            'nomor_telepon'=> 'required',
        ]);
        $karyawan = Pendaftaran::find($id);
        $karyawan->nama = $request->nama;
        $karyawan->perusahaan = $request->perusahaan;
        $karyawan->nomor_telepon = $request->nomor_telepon;
        $karyawan->save();
        return redirect()->route('daftam.index')->with('success_message', 'Berhasil mengubah data tamu');
        } 

        public function destroy(Request $request, $id)
        {
        //Menghapus
        $pendaftaran = Pendaftaran::find($id);
        if ($pendaftaran) $pendaftaran->delete();
        return redirect()->route('daftam.index')->with('success_message', 'Berhasil menghapus pendaftaran "' . $pendaftaran->nama . '" !');
        }
        

}
