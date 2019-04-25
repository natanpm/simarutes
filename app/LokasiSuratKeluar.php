<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LokasiSuratKeluar extends Model
{
    protected $table = 'lokasisuratkeluar';

    protected $fillable = [
        'idLokasi', 'idSuratKeluar',
    ];

    public function suratKeluar(){
        return $this->belongsTo(SuratKeluarBarang::class, 'idSuratKeluar','id');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'idLokasi','id');
    }
}
