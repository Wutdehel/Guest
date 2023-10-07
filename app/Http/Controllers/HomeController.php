<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Models\KeluarMasuk;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pendaftaran = Pendaftaran::orderBy('id','desc')->get();
        $jumlahTamuBelumKeluar = KeluarMasuk::where('keterangan', 'belum_keluar')->count();
        $tanggalMasukData = KeluarMasuk::pluck('tanggal_masuk');
        $averageWeekly = $this->calculateAverageWeekly($tanggalMasukData);
        return view('home', [ 
            'pendaftaran' => $pendaftaran,
            'jumlahTamuBelumKeluar' => $jumlahTamuBelumKeluar, 
            'averageWeekly' => $averageWeekly,
        ]);
    }
    private function calculateAverageWeekly($dates)
    {
        $dates = $dates->map(function ($date) {
            return Carbon::parse($date, 'Asia/Jakarta')->startOfWeek();
        });

        $weeklyAverages = $dates->groupBy(function ($date) {
            return $date->format('Y-W'); // Group tanggal ke dalam format tahun-minggu
        })->map(function ($weekDates) {
            return $weekDates->count(); // Hitung jumlah tanggal dalam setiap minggu
        });

        return $weeklyAverages->avg(); // Hitung rata-rata dari jumlah tanggal dalam minggu
    }
}
