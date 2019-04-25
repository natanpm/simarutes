<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LampiranSuratKeluar extends Model
{
    protected $table = 'lampiransuratkeluar';

    protected $fillable = [
        'path','pathUri', 'idSuratKeluar', 'namaFile'
    ];

    public function suratKeluarBarang(){
        return $this->belongsTo(SuratKeluarBarang::class, 'idSuratKeluar','id');
    }
}
