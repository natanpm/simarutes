<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan';

    protected $fillable = [
        'kegiatan', 'tanggalMulai', 'tanggalBerakhir','jamMasuk','jamKeluar','idSuratMasuk'
    ];

    public function suratMasuk(){
        return $this->belongsTo(SuratMasuk::class, 'idSuratMasuk','id');
    }

    public function lokasiKerja(){
        return $this->hasMany(LokasiKerja::class, 'idPekerjaan','id');
    }
}
