<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'nik', 'nama', 'username', 'password', 'role', 'idLokasi','statusUser','kontak'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getTextRoleAttribute($value)
    {
        if ($value == 0) {
            return "Super Validator";
        } elseif ($value == 1) {
            return "Validator";
        } elseif ($value == 2) {
            return "Admin";
        } else {
            return "Security";
        }
    }

    public function securityMasuk(){
        return $this->hasMany(LogMasuk::class, 'idSecurityMasuk','id');
    }

      public function security(){
        return $this->hasMany(LogBarangKeluar::class, 'idSecurity','id');
    }

    public function securityKeluar(){
        return $this->hasMany(LogMasuk::class, 'idSecurityKeluar','id');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class,'idLokasi','id');
    }

    public function pengguna(){
        return $this->hasOne(Pengguna::class,'idUser', 'id');
    }
}
