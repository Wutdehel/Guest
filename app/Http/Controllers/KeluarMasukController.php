<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Storage;
use App\Models\KeluarMasuk;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class KeluarMasukController extends Controller
{
    public function index()
    {
        //Menampilkan Form Tambah 
        return view(
            'keluarmasuk.index',
            [
                'keluarmasuk' => KeluarMasuk::all(),
                'pendaftaran' => Pendaftaran::all(),
            ]
        );
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('q');
        $results = Pendaftaran::where('nama', 'LIKE', "%{$searchQuery}%")
            ->orWhere('nomor_telepon', 'LIKE', "%{$searchQuery}%")
            ->get();

        return view('keluarmasuk.index', compact('results'));
    }

    public function create(Request $request)
    {
        $id_pendaftaran = $request->input('id_pendaftaran');
        $pendaftaran = Pendaftaran::find($id_pendaftaran);

        return view('keluarmasuk.create', compact('pendaftaran'));
    }

    public function modals(Request $request)
    {
        $request->validate([
            'lantai' => 'required|numeric',
            'rak' => 'required|numeric|max:100',
            'keperluan' => 'required',
            'detail' => 'required',
            'tanggal_masuk' => 'required|date',
            'foto_masuk' => 'required',
        ]);

        $imageData = $request->input('foto_masuk');

        // Konversi data base64 ke file gambar sementara
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));

        // Membuat nama file unik
        $imageName = uniqid() . '.jpg';

        // Simpan gambar ke storage atau direktori yang Anda inginkan
        Storage::disk('public')->put($imageName, $image);

        $data = [
            'id_pendaftaran' => $request->input('id_pendaftaran'),
            'lantai' => $request->input('lantai'),
            'rak' => $request->input('rak'),
            'keperluan' => $request->input('keperluan'),
            'detail' => $request->input('detail'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'foto_masuk' => $imageName,
        ];

        Keluarmasuk::create($data);

        return redirect()->route('keluarmasuk.index')->with('success_message', 'Terimakasih telah melakukan reservasi ');
    }

    public function edit($id)
    {
        $item = Keluarmasuk::findOrFail($id);

        $item->update([
            'tanggal_keluar' => Carbon::now()->setTimezone('Asia/Jakarta'),
            'keterangan' => 'done',
        ]);

        return redirect()->route('keluar.index')->with('success_message', 'Data berhasil diperbarui.');
    }
}
