<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaspangSuratKeluar extends Model
{
    protected $table = 'waspangsuratkeluar';

    protected $fillable = [
        'idSuratKeluar', 'idPicTelkom'
    ];

    public function picTelkom(){
        return $this->belongsTo(PicTelkom::class, 'idPicTelkom','id');
    }

    public function suratKeluarBarang(){
        return $this->belongsTo(suratKeluarBarang::class, 'idSuratKeluar','id');
    }
}
