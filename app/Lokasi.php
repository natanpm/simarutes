<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';

    protected $fillable = [
        'lokasi',
    ];

    public function lokasiKerja(){
        return $this->hasMany(LokasiKerja::class, 'idLokasi','id');
    }

    public function lokasiSuratKeluar(){
        return $this->hasMany(LokasiSuratKeluar::class, 'idLokasi','id');
    }

    public function logMasuk(){
        return $this->hasMany(LogMasuk::class,'idLokasi','id');
    }

     public function logBarangKeluar(){
        return $this->hasMany(LogBarangKeluar::class,'idLokasi','id');
    }

    public function user(){
        return $this->hasMany(User::class,'idLokasi','id');
    }
}
