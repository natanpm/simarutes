<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluarBarang extends Model
{
    protected $table = 'suratkeluarbarang';

    protected $fillable = [
        'nomorSurat',
        'kepada',
        'nik',
        'perusahaan',
        'jabatan',
        'perihal',
        'statusSurat',
        'keterangan',
        'tanggal',
    ];

    public function lokasiSuratKeluar()
    {
        return $this->hasMany(LokasiSuratKeluar::class, 'idSuratkeluar', 'id');
    }

     public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'idSuratkeluar', 'id');
    }

    public function lampiranSuratKeluar(){
        return $this->hasOne(LampiranSuratKeluar::class,'idSuratkeluar', 'id');
    }

    public function waspangSuratKeluar(){
        return $this->hasMany(WaspangSuratKeluar::class, 'idSuratkeluar', 'id');
    }

     public function logBarangKeluar()
    {
        return $this->hasMany(LogBarangKeluar::class, 'idSuratKeluar', 'id');
    }
}
