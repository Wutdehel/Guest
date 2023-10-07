<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KeluarMasuk;
use App\Models\Pendaftaran;


class LogTamuController extends Controller
{
    public function index()
    {
        return view(
            'logtamu.index', [
                'keluarmasuk' => KeluarMasuk::all()
            ]);
    }

    public function edit($id)
    { 
        //Menampilkan Form Edit
        $keluarmasuk = KeluarMasuk::find($id);
        if (!$keluarmasuk) return redirect()->route('logtamu.index')->with('error_message', 'Log Tamu dengan id' . $id . ' tidak ditemukan');
        return view('logtamu.edit', [
            'keluarmasuk' => $keluarmasuk
        ]);
    }

    public function searchta(Request $request)
    {
        {
        $start = $request->input('start');
        $end = $request->input('end');

        $query = KeluarMasuk::query();

        if (!empty($start)) {
            $query->whereDate('tanggal_masuk', '=', $start);
        }

        if (!empty($end)) {
            $query->whereDate('tanggal_keluar', '=', $end);
        }

        $query->whereNotNull('tanggal_keluar');
        $keluarmasuk = $query->get();
        
            return view('logtamu.index', ['keluarmasuk' => $keluarmasuk]);

        }
    }
}