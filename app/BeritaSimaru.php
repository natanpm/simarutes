<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaSimaru extends Model
{
    protected $table = 'beritaSimaru';

    protected $fillable = [
        'statusKondisi', 'pesan', 'statusBerita'
    ];


}
