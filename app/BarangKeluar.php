<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'daftarbarang';

    protected $fillable = [
        'idSuratKeluar', 'namaBarang','merek','serialNumber'
    ];

    public function suratkeluarBarang(){
        return $this->belongsTo(SuratKeluarBarang::class, 'idSuratKeluar','id');
    }
}
