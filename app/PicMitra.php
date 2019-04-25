<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PicMitra extends Model
{
    protected $table = 'picMitra';

    protected $fillable = [
        'nik', 'nama', 'kontak','keterangan','idPerusahaan','idUnitPerusahaan','statusNda'
    ];

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class, 'idPerusahaan','id');
    }

    public function unitPerusahaan(){
        return $this->belongsTo(UnitPerusahaan::class, 'idUnitPerusahaan','id');
    }

    public function petugas(){
        return $this->hasMany(Petugas::class, 'idPicMitra','id');
    }

    public function nda(){
        return $this->hasOne(Nda::class, 'idPicMitra','id');
    }
}
