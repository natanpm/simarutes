<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'suratMasuk';

    protected $fillable = [
        'nomorSurat',
        'kepada',
        'jumlahLampiran',
        'perihal',
        'suratDinas',
        'validate1',
        'validate2',
        'statusSurat',
        'keterangan',
    ];

    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'idSuratMasuk', 'id');
    }

    public function lampiran(){
        return $this->hasOne(Lampiran::class,'idSuratMasuk', 'id');
    }

    public function logMasuk()
    {
        return $this->hasMany(LogMasuk::class, 'idSuratMasuk', 'id');
    }

    public function petugas()
    {
        return $this->hasMany(Petugas::class, 'idSuratMasuk', 'id');
    }

    public function waspang(){
        return $this->hasMany(Waspang::class, 'idSuratMasuk', 'id');
    }

    public function forward(){
        return $this->hasMany(Forwarding::class, 'idSuratMasuk', 'id');
    }
}
