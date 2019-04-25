<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $table = 'lampiran';

    protected $fillable = [
        'path','pathUri', 'idSuratMasuk', 'namaFile'
    ];

    public function suratMasuk(){
        return $this->belongsTo(SuratMasuk::class, 'idSuratMasuk','id');
    }
}
