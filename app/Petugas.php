<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';

    protected $fillable = [
        'idPicMitra', 'idSuratMasuk',
    ];

    public function picMitra(){
        return $this->belongsTo(PicMitra::class, 'idPicMitra','id');
    }

    public function suratMasuk(){
        return $this->belongsTo(SuratMasuk::class, 'idSuratMasuk','id');
    }

    public function logMasuk(){
        return $this->hasMany(LogMasuk::class,'idPetugas','id');
    }
}
