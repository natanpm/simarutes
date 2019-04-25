<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $fillable = [
        'idUser', 'idPicTelkom',
    ];

    public function picTelkom(){
        return $this->belongsTo(PicTelkom::class, 'idPicTelkom','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'idUser','id');
    }
}
