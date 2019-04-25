<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Witel extends Model
{
    protected $table = 'witel';

    protected $fillable = [
        'witel',
    ];


    public function user(){
        return $this->hasMany(User::class,'idWitel','id');
    }
}