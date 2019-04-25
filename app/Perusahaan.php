<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = [
        'namaPerusahaan'
    ];

    public function unitPerusaan(){
        return $this->hasMany(UnitPerusahaan::class, 'idPerusahaan','id');
    }

    public function petugas(){
        return $this->hasMany(PicMitra::class, 'idPerusahaan','id');

    }
}
