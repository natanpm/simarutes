<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogMasuk extends Model
{
    protected $table = 'logMasuk';

    protected $fillable = [
        'tanggalMasuk',
        'tanggalKeluar',
        'masuk',
        'keluar',
        'statusLog',
        'idPetugas',
        'idSuratMasuk',
        'idSecurityMasuk',
        'idSecurityKeluar',
        'idLokasi',
        'keterangan',
        'pesan'
    ];

    public function Petugas(){
        return $this->belongsTo(Petugas::class, 'idPetugas','id');
    }

    public function securityMasuk(){
        return $this->belongsTo(User::class, 'idSecurityMasuk','id');
    }

    public function securityKeluar(){
        return $this->belongsTo(User::class, 'idSecurityKeluar','id');
    }

    public function suratMasuk(){
        return $this->belongsTo(SuratMasuk::class, 'idSuratMasuk','id');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'idLokasi','id');
    }
}
