<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitPerusahaan extends Model
{
    protected $table = 'unitPerusahaan';

    protected $fillable = [
        'namaUnit', 'idPerusahaan'
    ];

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class, 'idPerusahaan','id');
    }

    public function picMitra(){
        return $this->hasMany(PicMitra::class, 'idUnitPerusahaan    ','id');
    }
}
