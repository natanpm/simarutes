<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LokasiKerja extends Model
{
    protected $table = 'lokasiKerja';

    protected $fillable = [
        'idLokasi', 'idPekerjaan',
    ];

    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class, 'idPekerjaan','id');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'idLokasi','id');
    }
}
