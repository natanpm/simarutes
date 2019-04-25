<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nda extends Model
{
    protected $table = 'nda';

    protected $fillable = [
        'path', 'tanggalBerlaku', 'tanggalBerakhir','statusNda','pathUri','idPicMitra','validasiNda'
    ];

    public function picMitra(){
        return $this->belongsTo(PicMitra::class, 'idPicMitra','id');
    }
}
