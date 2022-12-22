<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_ruangan extends Model
{
    protected $guarded = ['id'];
    public function kategori(){

        return $this->belongsTo('App\Models\kategori');
    }

    public function fasilitas(){
        return $this->belongsToMany(Fasilitas::class,'fasilitas_ruangans');
    }
}
