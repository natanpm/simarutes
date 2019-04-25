<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PicTelkom extends Model
{
    protected $table = 'picTelkom';

    protected $fillable = [
        'nik', 'nama', 'kontak', 'unit', 'idUser',
    ];

    public function pengguna(){
        return $this->hasOne(Pengguna::class, 'idPicTelkom','id');
    }

    public function waspang(){
        return $this->hasMany(Waspang::class, 'idPicTelkom','id');
    }

    public function waspangSuratKeluar(){
        return $this->hasMany(WaspangSuratKeluar::class, 'idPicTelkom','id');
    }

    public function forward(){
        return $this->hasMany(Forwarding::class, 'idPicTelkom','id');
    }

}
