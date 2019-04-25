<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forwarding extends Model
{
    protected $table = 'forwarding';

    protected $fillable = [
        'idSuratMasuk', 'idPicTelkom', 'kontak','keterangan','idPerusahaan','idUnitPerusahaan'
    ];

    public function picTelkom(){
        return $this->belongsTo(PicTelkom::class, 'idPicTelkom','id');
    }

    public function suratMasuk(){
        return $this->belongsTo(SuratMasuk::class, 'idSuratMasuk','id');
    }

     public function suratKeluar(){
        return $this->belongsTo(SuratKeluarBarang::class, 'idSuratKeluar','id');
    }
}
