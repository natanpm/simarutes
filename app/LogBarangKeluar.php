<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogBarangKeluar extends Model
{
    protected $table = 'logbarangkeluar';

    protected $fillable = [
        'tanggalValidasi',
        'idSecurity',
        'idSuratKeluar',
        'idLokasi',
        
    ];

   

    public function security(){
        return $this->belongsTo(User::class, 'idSecurity','id');
    }

    public function suratKeluar(){
        return $this->belongsTo(SuratMasuk::class, 'idSuratKeluar','id');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'idLokasi','id');
    }
}
