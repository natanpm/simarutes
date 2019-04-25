<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waspang extends Model
{
    protected $table = 'waspang';

    protected $fillable = [
        'idSuratMasuk', 'idPicTelkom', 'kontak','keterangan','idPerusahaan','idUnitPerusahaan'
    ];

    public function picTelkom(){
        return $this->belongsTo(PicTelkom::class, 'idPicTelkom','id');
    }

    public function suratMasuk(){
        return $this->belongsTo(SuratMasuk::class, 'idSuratMasuk','id');
    }
}
