<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluarMasuk extends Model
{
    use HasFactory;
    protected $table = 'keluar_masuk';
    protected $fillable = [
        'id_pendaftaran',
        'tanggal_masuk',
        'tanggal_keluar',
        'foto_masuk',       
        'waktu_masuk',
        'waktu_keluar'
    ];

    public function pendaftaran(){
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id', 'nama');
        }
}
